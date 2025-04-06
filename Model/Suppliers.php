<?php
/**
 * @name SuppliersModel 
 * @author YONY ACEVEDO
 * @description Modelo que se encarga de procesar las solicitudes hechas por el controlador 
 * de la clase Suppliers o Proveedores
 */

class SuppliersModel extends Model
{
            
    public function __construct()
    {
        parent::__construct();
        $this->sModel = 'suppliers';
        $this->sId = 'suppliers.id';
        $this->sCondition = '';
        $this->sResponse = array();
        $this->sTable = '(((suppliers INNER JOIN business ON suppliers.business_id = business.id) INNER JOIN customers_type ON suppliers.type_id = customers_type.id) INNER JOIN users ON suppliers.users_id = users.id) INNER JOIN sellers ON users.sellers_id = sellers.id ';
        $this->sField = array(
                            'suppliers.id AS suppliers_id','suppliers.business_id AS suppliers_business_id',
                            'suppliers.users_id AS suppliers_users_id','suppliers.identity_card AS suppliers_identity_card',
                            'suppliers.description AS suppliers_description','suppliers.phone AS suppliers_phone',
                            'suppliers.facsimile AS suppliers_facsimile','suppliers.address AS suppliers_address',
                            'suppliers.website AS suppliers_website','suppliers.email AS suppliers_email',
                            'suppliers.issuing_entity_id AS suppliers_issuing_entity_id','suppliers.bank_account AS suppliers_bank_account',
                            'suppliers.type_id AS suppliers_type_id','suppliers.is_active AS suppliers_is_active',
                            'suppliers.created AS suppliers_created','business.description AS business_description','sellers.description AS sellers_description'
                        );
    }
}