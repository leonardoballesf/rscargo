<?php

class PresentationModel extends Model
{
    
    public function __construct()
    {
        parent::__construct();
        $this->sModel = 'presentation';
        $this->sId = 'presentation.id';
        $this->sCondition = 'WHERE business.is_active=1';
        $this->sResponse = array();
        $this->sTable = '(presentation INNER JOIN business ON presentation.business_id = business.id) INNER JOIN (users INNER JOIN sellers ON users.sellers_id = sellers.id) ON presentation.users_id = users.id ';
        $this->sField =array(
                        'presentation.id AS presentation_id', 'presentation.business_id AS presentation_business_id', 'presentation.users_id AS presentation_users_id',
                        'presentation.description AS presentation_description', 'presentation.abbreviation AS presentation_abbreviation', 'presentation.quantity AS presentation_quantity',
                        'presentation.is_active AS presentation_is_active', 'presentation.created AS presentation_created', 'presentation.modified AS presentation_modified',
                        'business.id AS business_id', 'business.description AS business_description', 'users.id AS users_id',
                        'users.username AS users_username', 'sellers.id AS sellers_id', 'sellers.description AS sellers_description'

                        );    
        

        
        
    }
    
    public function getProperties(array $data=array())
    {
        $this->sTable = $data['tbl_name'];
        $this->sField = $data['fields'];
        $this->sCondition = $data['condition'];
        
        $sResponse =  $this->findAll();
        return $sResponse;
    }   
    
    
    
}
