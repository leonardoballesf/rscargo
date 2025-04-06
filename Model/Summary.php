<?php
/**
 * @name SummaryModel 
 * @author YONY ACEVEDO
 * @description Modelo que se encarga de procesar las solicitudes hechas por el controlador 
 * de la clase Packages o Paquetes
 */

class SummaryModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->sModel = 'packages';
        $this->sId = 'packages.id';
        $this->sCondition = '';
        $this->sResponse = array();
        $this->sTable = '((((packages INNER JOIN suppliers ON packages.suppliers_id=suppliers.id) INNER JOIN customers ON packages.customers_id = customers.id) INNER JOIN bookshop ON packages.bookshop_id=bookshop.id) INNER JOIN (users INNER JOIN sellers ON users.sellers_id=sellers.id) ON bookshop.users_id=users.id) INNER JOIN status_type ON bookshop.is_active=status_type.id ';
        $this->sField = array('packages.id AS packages_id','packages.bookshop_id AS packages_bookshop_id','packages.suppliers_id AS packages_suppliers_id', 
        'packages.customers_id AS packages_customers_id','packages.code AS packages_code','packages.order_number AS packages_order_number','packages.description AS packages_description','packages.weight AS packages_weight',
        'packages.bulk AS packages_bulk','packages.delivered AS packages_delivered','packages.registration_date AS packages_registration_date','packages.cost AS packages_cost','packages.payment_methods_id AS packages_payment_methods_id',
        'packages.delivery_date AS packages_delivery_date','packages.users_id AS packages_users_id','packages.is_active AS packages_is_active',
        'packages.created AS packages_created','suppliers.id AS suppliers_id','suppliers.description AS suppliers_description','customers.name AS customers_description',
        'status_type.description AS status_description','sellers.description AS sellers_description','bookshop.description AS bookshop_description');
    }

    public function getSummaryDaily(){

        $date = date('Y-m-d');

        $this->sTable = 'packages';
        $this->sField = array('sum(cost) as totalday, CURDATE() as day');
        $this->sCondition = 'where delivered = 3 and delivery_date = CURDATE()';

        $sResponse =  $this->findAll();
        return $sResponse;

    }

    public function getSummaryMonth(){
 
        $firts_date = date('Y-m').'-01';
        $date = new DateTime($firts_date);
        $date->modify('last day of this month');
        $last_date = $date->format('Y-m-d');


        $this->sTable = 'packages';
        $this->sField = array('sum(cost) as totalmonth');
        $this->sCondition = 'where delivered = 3 and (delivery_date BETWEEN "'.$firts_date.'" AND "'.$last_date.'")';


        $sResponse =  $this->findAll();
        return $sResponse; 


    }

}