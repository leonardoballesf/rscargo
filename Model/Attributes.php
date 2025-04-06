<?php

class AttributesModel extends Model
{
            
    public function __construct()
    {
        parent::__construct();
        $this->sModel = 'attributes';
        $this->sId = 'attributes.id';
        $this->sCondition = 'WHERE business.is_active=1';
        $this->sResponse = array();
        $this->sTable = '(((attributes INNER JOIN business ON attributes.business_id = business.id) INNER JOIN status_type ON attributes.is_active = status_type.id) INNER JOIN users ON attributes.users_id = users.id) INNER JOIN sellers ON users.sellers_id = sellers.id ';
                        
        $this->sField = array(
                        'attributes.id AS attributes_id','attributes.business_id AS attributes_business_id','attributes.users_id AS attributes_users_id',
                        'attributes.description AS attributes_description','attributes.description AS attributes_name','attributes.is_active AS attributes_is_active',
                        'attributes.created AS attributes_created','attributes.modified AS attributes_modified','status_type.description AS status_type_description',
                        'business.description AS business_description','sellers.description AS sellers_description'
        );
    }
}
