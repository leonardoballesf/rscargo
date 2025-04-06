<?php
/**
 * @name UsersModel 
 * @author YONY ACEVEDO
 * @description Modelo que se encarga de procesar las solicitudes hechas por el controlador 
 * de la clase Users o Usuarios
 */

class UsersModel extends Model
{
    
    public function __construct()
    {
        parent::__construct();
        $this->sModel = 'users';
        $this->sId = 'users.id';
        $this->sCondition = '';
        $this->sResponse = array();
        $this->sTable = '(users INNER JOIN status_type ON users.is_active = status_type.id) INNER JOIN sellers ON users.sellers_id = sellers.id ';
        $this->sField = array(
                            'users.id AS users_id', 'users.sellers_id AS users_sellers_id', 
                            'users.username AS users_username', 'users.password AS users_password',
                            'users.role AS users_role','users.by_id AS users_by_id',
                            'users.bookshop_id AS users_bookshop_id', 'users.is_active AS users_is_active', 
                            'status_type.description AS status_description', 'users.created AS users_created', 
                            'users.modified AS users_modified', 'sellers.description AS sellers_description',
                            'sellers.identity_card AS sellers_identity_card'
                        );
    }
    
    public function assign(array $data=array())
    {
        $this->sModel='users_hash_bookshop';
        $sResponse=array();
        $count = $this->count('SELECT * FROM users_hash_bookshop where bookshop_id = '.$data['bookshop_id'].' and users_id = '.$data['users_id'].';');
        
        switch($count){
            case 0:
                $data['operation']='CREATE';
                break;
            case 1:
                $data['operation']='UPDATE';
                break;
        }
        
        $sResponse = $this->save($data);
        return $sResponse;
    }    
}