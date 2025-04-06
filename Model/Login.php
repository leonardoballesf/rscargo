<?php

class LoginModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function run()
    {
        try {

        $sth = $this->db->prepare('
        SELECT 
            users.id as userid, users.username as username, 
            users.password as password, users.role as role, 
            users.is_active as is_active,users.bookshop_id as bookshop_id, sellers.identity_card as identity_card,
            sellers.description as description, business.description as business_description, 
            business.id as business_id,business.logo as business_logo
        FROM (users INNER JOIN sellers ON users.sellers_id = sellers.id) INNER JOIN business ON sellers.business_id = business.id
        WHERE (((users.username)=:username));
        ');
        
        $sth->execute(array(':username' => $_POST['username']));
        
        $data = $sth->fetch();
        
        $count =  $sth->rowCount();
        if ($count > 0) {
            
            if($data['password']==Hash::create('sha256', $_POST['password'], HASH_PASSWORD_KEY) && $data['is_active']==1){
                
                        define('DURACION_SESION','14400'); //4 horas
        ini_set("session.cookie_lifetime",DURACION_SESION);
        ini_set("session.gc_maxlifetime",DURACION_SESION); 
        ini_set("session.save_path","/tmp");
        session_cache_expire(DURACION_SESION);
        session_regenerate_id(true); 
        //session_start();
                
                // login
                Session::init();
                Session::set('role', $data['role']);
                Session::set('loggedIn', true);
                Session::set('userid', $data['userid']);
                Session::set('description', $data['description']);
                Session::set('identity_card', $data['identity_card']);
                Session::set('username', $data['username']);
                Session::set('business_description', $data['business_description']);
                Session::set('business_id', $data['business_id']);
                Session::set('bookshop_id', $data['bookshop_id']);
                Session::set('business_logo', $data['business_logo']);
                Session::set('is_active', $data['is_active']);


                return array("message_type"=>1,"message"=>'Inicio de Sesión Exitoso',"redirect"=>URL.'Index'); /*Contraseña Correcta*/

            }else{
                return array("message_type"=>2,"message"=>'Contraseña Incorrecta',"redirect"=>URL.'Login'); /*Contraseña Incorrecta*/
            }

            if($data['password']==Hash::create('sha256', $_POST['password'], HASH_PASSWORD_KEY) && $data['is_active']!=1){
                return array("message_type"=>3,"message"=>'Usuario Inactivo',"redirect"=>URL.'Login'); /*Usuario Inactivo*/
            }

        } else {
            return array("message_type"=>4,"message"=>'Usuario No Registrado en el Sistema',"redirect"=>URL.'Login'); /*Usuario Inactivo*/
        }
            
        } catch (PDOException $e) {
            return array("message_type"=>5,"message"=>'Error SQL: '.$e->getCode(),"redirect"=>URL.'Login'); /*Usuario Inactivo*/
        }
    }
    
}
