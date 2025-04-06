<?php

class CatalogModel extends Model
{
    
    public function __construct()
    {
        parent::__construct();
        $this->sModel = 'catalog';
        $this->sId = 'catalog.id';
        $this->sCondition = 'WHERE  catalog.category_id != 1 and business.is_active=1';
        $this->sResponse = array();
        $this->sTable = '(((catalog INNER JOIN business ON catalog.business_id = business.id) INNER JOIN users ON catalog.users_id = users.id) INNER JOIN sellers ON users.sellers_id = sellers.id) INNER JOIN status_type ON catalog.is_active = status_type.id ';
        $this->sField =array(
                            'catalog.id AS catalog_id','catalog.business_id AS catalog_business_id','catalog.users_id AS catalog_users_id',
                            'catalog.category_id AS catalog_category_id','catalog.code AS catalog_code','catalog.bardcode AS catalog_bardcode', 
                            'catalog.title AS catalog_title','catalog.description AS catalog_description','catalog.tax_exempt AS catalog_tax_exempt','catalog.is_active AS catalog_is_active',
                            'catalog.created AS catalog_created','catalog.modified AS catalog_modified','business.description AS business_description',
                            'users.bookshop_id AS users_bookshop_id','sellers.description AS sellers_description','status_type.description AS status_type_description'
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