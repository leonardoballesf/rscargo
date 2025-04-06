<?php

class TariffsModel extends Model
{
            
    public function __construct()
    {
        parent::__construct();
        $this->sModel = 'tariffs';
        $this->sId = 'tariffs.id';
        $this->sCondition = 'WHERE business.is_active=1';
        $this->sResponse = array();
        $this->sTable = '(((tariffs INNER JOIN business ON tariffs.business_id = business.id) INNER JOIN status_type ON tariffs.is_active = status_type.id) INNER JOIN users ON tariffs.users_id = users.id) INNER JOIN sellers ON users.sellers_id = sellers.id ';
                        
        $this->sField = array(
                        'tariffs.id AS tariffs_id','tariffs.business_id AS tariffs_business_id','tariffs.users_id AS tariffs_users_id',
                        'tariffs.description AS tariffs_description','tariffs.name AS tariffs_name','tariffs.value AS tariffs_value','tariffs.is_active AS tariffs_is_active',
                        'tariffs.created AS tariffs_created','tariffs.modified AS tariffs_modified','status_type.description AS status_type_description',
                        'business.description AS business_description','sellers.description AS sellers_description'
        );
        
    }
}
