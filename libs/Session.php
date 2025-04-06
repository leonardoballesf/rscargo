<?php

class Session
{
    
    function __construct() {

        ini_set("session.cookie_lifetime","14400");
        ini_set("session.gc_maxlifetime","14400");
    }
    
    public static function init()
    {
        define('DURACION_SESION','14400'); //4 horas
        ini_set("session.cookie_lifetime",DURACION_SESION);
        ini_set("session.gc_maxlifetime",DURACION_SESION); 
        ini_set("session.save_path","/tmp");
        session_cache_expire(DURACION_SESION);
        session_regenerate_id(true); 
        session_start();


    }
    
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }
    
    public static function get($key)
    {
        if (isset($_SESSION[$key]))
        return $_SESSION[$key];
    }
        
    public static function remove($key)
    {
        if (isset($_SESSION[$key]))
        unset($_SESSION[$key]);
    }


    public static function destroy()
    {
        $_SESSION = array();
        session_destroy();
        if (ini_get("session.use_cookies")) 
        {
          $params = session_get_cookie_params();
          setcookie(session_name(), '', time() - 42000,
              $params["path"], $params["domain"],
              $params["secure"], $params["httponly"]);
        }
    }
    
}