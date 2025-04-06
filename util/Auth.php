<?php
/**
 * 
 */
class Auth extends Session
{
   
    public static function handleLogin()
    {
        Session::init();
        $logged = Session::get('loggedIn');
        $role = Session::get('role');

        if (!$logged) {
            Session::destroy();
            header('location: ' . URL .  'Login');
            exit;
        }
        if (!$logged) {
            Session::destroy();
            header('location: ' . URL .  'Login');
            exit;
        }

    }

    public static function levelAuth($level=1)
    {
        Session::init();
        $role = Session::get('role');
        return $role;
    }
    
    
}
