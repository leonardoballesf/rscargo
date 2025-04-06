<?php

class BusinessModel extends Model
{
            
    public function __construct()
    {
        parent::__construct();
        $this->sModel = 'business';
        $this->sId = 'business.id';
        $this->sCondition = '';
        $this->sResponse = array();
        $this->sTable = 'business INNER JOIN status_type ON business.is_active = status_type.id ';
        $this->sField = array(
                        'business.id AS business_id','business.identity_card AS business_identity_card','business.owner_identity_card AS business_owner_identity_card',
                        'business.owner_description AS business_owner_description','business.description AS business_description','business.address AS business_address',
                        'business.phone AS business_phone','business.facsimile AS business_facsimile','business.email AS business_email','business.website AS business_website',
                        'business.logo AS business_logo','business.is_active AS business_is_active','business.created AS business_created','business.modified AS business_modified', 
                        'status_type.description AS status_type_description'
        );
    }
    
}