<?php

class InvoicesModel extends Model
{
    private $code;
    private $bardcode;
    private $fiscalYear=2017;
    
    public function __construct()
    {
        parent::__construct();
        $this->sModel = 'invoices';
        $this->sId = 'invoices.id';
        $this->sCondition = '';
        $this->sResponse = array();
        $this->sTable = '((((invoices INNER JOIN bookshop ON invoices.bookshop_id = bookshop.id) INNER JOIN customers ON invoices.customers_id = customers.id) INNER JOIN users ON invoices.users_id = users.id) INNER JOIN sellers ON users.sellers_id = sellers.id) INNER JOIN status_type ON invoices.is_active = status_type.id ';
        $this->sField = array(
                        'invoices.id AS invoices_id','invoices.bookshop_id AS invoices_bookshop_id','invoices.code AS invoices_code',
                        'invoices.customers_id AS invoices_customers_id','invoices.barcode AS invoices_barcode','invoices.tax_amount AS invoices_tax_amount',
                        'invoices.taxable_amount AS invoices_taxable_amount','invoices.discount_amount AS invoices_discount_amount',
                        'invoices.invoices_amount AS invoices_invoices_amount','invoices.users_id AS invoices_users_id',
                        'invoices.is_active AS invoices_is_active','invoices.created AS invoices_created',
                        'invoices.modified AS invoices_modified','customers.identity_card AS customers_identity_card','sellers.description AS sellers_description',
                        'bookshop.description AS bookshop_description','status_type.description AS status_type_description'
                        );
    }
    
    public function getfiscalYear(){
        return $this->fiscalYear;
    }

    public function setbarCode($code = array()){
        
        $count = $this->count(' 
        SELECT 
        invoices.barcode AS invoices_barcode
        FROM 
        (invoices INNER JOIN bookshop ON invoices.bookshop_id = bookshop.id) INNER JOIN users ON invoices.users_id = users.id
        WHERE 
        (((users.id)='.$code['user'].') AND ((bookshop.is_current)=1) AND ((bookshop.is_active)=1));
        ');
        
        
        if($count>0){
            $this->bardcode = $this->getfiscalYear().$code['bookshop'].$code['user'].(str_pad((intval($count)+ 1),10,"0",STR_PAD_LEFT));
        }else{
            $count=1;
            $this->bardcode = $this->getfiscalYear().$code['bookshop'].$code['user'].(str_pad((intval($count)),10,"0",STR_PAD_LEFT));
        }
        return $this->bardcode;
    }
    
    public function setCode($code = array()){
        
        $count = $this->count(' 
        SELECT 
            invoices.code
        FROM 
            (invoices INNER JOIN bookshop ON invoices.bookshop_id = bookshop.id) INNER JOIN users ON invoices.users_id = users.id
        WHERE 
            (((users.id)='.$code['user'].') AND ((bookshop.is_current)=1) AND ((bookshop.is_active)=1));
        ');
        
        if($count>0){
            $this->code='F'.$this->getfiscalYear().'-'.$code['bookshop'].$code['user'].'-'.(str_pad((intval($count)+ 1),10,"0",STR_PAD_LEFT));
        }else{
            $count=1;
            $this->code='F'.$this->getfiscalYear().'-'.$code['bookshop'].$code['user'].'-'.(str_pad((intval($count)),10,"0",STR_PAD_LEFT));
        }
        return $this->code;
    }
        
    public function setItem($code = ""){
        
        $count = $this->count(' 
        SELECT 
            invoices.code
        FROM 
            (invoices INNER JOIN bookshop ON invoices.bookshop_id = bookshop.id) INNER JOIN users ON invoices.users_id = users.id
        WHERE 
            (((users.id)='.$code.') AND ((bookshop.is_current)=1) AND ((bookshop.is_active)=1));
        ');
        
        if($count>0){
            $this->code='F-'.$this->getfiscalYear().$code.'-'.(str_pad((intval($count)+ 1),10,"0",STR_PAD_LEFT));
        }else{
            $count=1;
            $this->code='F-'.$this->getfiscalYear().$code.'-'.(str_pad((intval($count)),10,"0",STR_PAD_LEFT));
        }
        return $this->code;
    }
    
    public function setItems($code=""){
        
        $this->sTable = ' (((existence INNER JOIN catalog ON existence.catalog_id = catalog.id) INNER JOIN conditions_type ON existence.condition_id = conditions_type.id) INNER JOIN prices ON existence.catalog_id = prices.catalog_id) INNER JOIN categories ON catalog.category_id = categories.id ';
        $this->sField = array(
                        'catalog.code AS catalog_code', 'catalog.bardcode AS catalog_bardcode', 'catalog.description AS catalog_description',
                        'catalog.tax_exempt AS catalog_tax_exempt', 'categories.description AS categories_description', 'existence.stock AS existence_stock',
                        'existence.condition_id AS existence_condition_id', 'conditions_type.description AS condition_description', 'prices.unit_cost AS prices_unit_cost',
                        'prices.is_active AS prices_is_active',
                        '(SELECT Sum(discounts.rate) FROM catalog INNER JOIN (discounts_hash_catalog INNER '
                        . 'JOIN discounts ON discounts_hash_catalog.id = discounts.id) ON '
                        . 'catalog.id = discounts_hash_catalog.catalog_id WHERE (((catalog.code)="'.$code.'") AND '
                        . '((discounts.business_id)='.Session::get('business_id').') AND ((discounts.is_active)=1)) OR (((catalog.bardcode)="'.$code.'"))) AS discounts_rate ',
                        '(SELECT Sum(taxes.rate) FROM catalog INNER JOIN (taxes_hash_catalog INNER '
                        . 'JOIN taxes ON taxes_hash_catalog.id = taxes.id) ON '
                        . 'catalog.id = taxes_hash_catalog.catalog_id WHERE (((catalog.code)="'.$code.'") AND '
                        . '((taxes.business_id)='.Session::get('business_id').') AND ((taxes.is_active)=1)) OR (((catalog.bardcode)="'.$code.'"))) AS taxes_rate '
        );

        $this->sGroupby='catalog.code, catalog.bardcode, catalog.description, catalog.tax_exempt, categories.description, existence.stock, existence.condition_id, conditions_type.description, prices.unit_cost, prices.is_active ';
        $this->sCondition = ' HAVING (((catalog.bardcode)="'.$code.'")) OR (((catalog.code)="'.$code.'")) ';
                                
        
        $item = $this->findAll();
        //return $this;
        return $item[0];
        
    }
    
    public function setCustomer($customer=""){
        
        $this->sTable = 'customers';
        $this->sId = 'identity_card';
        $this->sField = array('*');
        
        $customer = $this->find('\''.$customer.'\'');
        
        return $customer;
        
    }    
    
}
