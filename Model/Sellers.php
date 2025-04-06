<?php
/**
 * @name SellersModel 
 * @author YONY ACEVEDO
 * @description Modelo que se encarga de procesar las solicitudes hechas por el controlador 
 * de la clase Sellers o Vendedores
 */

class SellersModel extends Model
{
            
    public function __construct()
    {
        parent::__construct();
        $this->sModel = 'sellers';
        $this->sId = 'sellers.id';
        $this->sCondition = '';
        $this->sResponse = array();
        $this->sTable = '(sellers INNER JOIN business ON sellers.business_id = business.id) INNER JOIN users ON sellers.users_id = users.id ';
        $this->sField = array(
                                'sellers.id AS sellers_id', 'sellers.identity_card AS sellers_identity_card',
                                'sellers.description AS sellers_description', 'sellers.address AS sellers_address',
                                'sellers.phone AS sellers_phone','sellers.email AS sellers_email', 
                                'sellers.gender_id AS sellers_gender_id', 'sellers.birthdate AS sellers_birthdate', 
                                'business.description AS business_empresa', 'business.id AS business_id', 
                                'sellers.is_active AS sellers_is_active', 'sellers.users_id AS sellers_users_id', 
                                'sellers.created AS sellers_created','users.username AS users_username'
                        );
    }
}