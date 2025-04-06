<?php
/**
 * @name CustomersModel 
 * @author YONY ACEVEDO
 * @description Modelo que se encarga de procesar las solicitudes hechas por el controlador 
 * de la clase Customers o Clientes
 */

class CustomersModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->sModel = 'customers';
        $this->sId = 'customers.id';
        $this->sCondition = '';
        $this->sResponse = array();
        $this->sTable = '((customers INNER JOIN bookshop ON customers.bookshop_id = bookshop.id) INNER JOIN users ON customers.users_id = users.id) INNER JOIN sellers ON users.sellers_id = sellers.id ';
        $this->sField = array(
                            'customers.id AS customers_id','customers.bookshop_id AS customers_bookshop_id','customers.code AS customers_code',
                            'customers.users_id AS customers_users_id','customers.type_id AS customers_type_id',
                            'customers.identity_card AS customers_identity_card','customers.nationality_id AS customers_nationality_id',
                            'customers.name AS customers_name','customers.phone AS customers_phone','customers.cell_phone AS customers_cell_phone',
                            'customers.email AS customers_email','customers.address AS customers_address','customers.tariffs_id AS customers_tariffs_id','customers.is_active AS customers_is_active',
                            'customers.created AS customers_created','bookshop.description AS bookshop_description','users.username AS users_username',
                            'sellers.description AS sellers_description'
                        );
        
    }
}