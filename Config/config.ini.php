<?php 
/*INFORMACIÓN DEL SISTEMA*/
define('WROOT', $_SERVER['DOCUMENT_ROOT']);
define('DS', DIRECTORY_SEPARATOR);
define('PATH_BASE', 'sistema');
define('ROOT', realpath(dirname (__FILE__)));
define('APPNAME', 'SISTEMA INTEGRAL DE FACTURACIÓN E INVENTARIO');
define('URL', 'https://sisclientes.rscargos.com/');
define('LIBS', 'libs');
/*INFORMACIÓN DEL SISTEMA*/

/*CONECCIÓN A LA SERVIDOR DE BASE DE DATOS*/
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_PORT', '3306');
define('DB_USER', 'rscargos_user');
define('DB_PASS', 'Rscargos2019.');
define('DB_NAME', 'rscargos_db');
/*CONECCIÓN A LA SERVIDOR DE BASE DE DATOS*/

define('HASH_GENERAL_KEY', '23k23j23hj23j23423887234asdsaKKkjkjhluY978');
define('HASH_PASSWORD_KEY', '23k23j23hj23j23423887234asdsaKKkjkjhluY978');

?>
