<?php

class CategoriesModel extends Model
{
    
    public function __construct()
    {
        parent::__construct();
        $this->sModel = 'categories';
        $this->sId = 'categories.id';
        $this->sCondition = 'WHERE business.is_active=1';
        $this->sResponse = array();
        $this->sTable = '((categories INNER JOIN business ON categories.business_id = business.id) INNER JOIN users ON categories.users_id = users.id) INNER JOIN sellers ON users.sellers_id = sellers.id ';
        $this->sField =array(
                            'categories.id AS categories_id', 'categories.parent_id AS categories_parent_id', 'categories.business_id AS categories_business_id',
                            'categories.users_id AS categories_users_id', 'categories.name AS categories_name', 'categories.description AS categories_description',
                            'categories.is_active AS categories_is_active', 'categories.created AS categories_created', 'categories.modified AS categories_modified',
                            'business.id AS business_id', 'business.description AS business_description', 'users.id AS users_id', 'users.username AS users_username',
                            'sellers.id AS sellers_id', 'sellers.description AS sellers_description'
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
