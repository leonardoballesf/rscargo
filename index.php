<?php
require 'Config/config.ini.php';
require( WROOT.DS.'util'.DS.'Auth.php' ); 
//require( WROOT.DS.PATH_BASE.DS.'util'.DS.'Auth.php' );
// Also spl_autoload_register (Take a look at it if you like)
function __autoload($class) {
    require LIBS .DS. $class .".php";
}

try {

    // Load the Bootstrap!
    $bootstrap = new Bootstrap();
    $bootstrap->init();
    
}catch(Exception $e) {
    
  echo 'Error: ' .$e->getMessage();
  
}

