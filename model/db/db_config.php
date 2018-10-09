<?php
// Data Base Config file
if($_SERVER['SERVER_ADDR'] !="127.0.0.1"){
    // Production config DB
    define('HOST','');
    define('DB_USER', '');
    define('DB_PASSWORD','');
    define('DB_NAME','');
    define('DB_DRIVER','mysql');
    define('CHARSET','utf8');
}else {
    // Developer server
    define('HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'crud');
    define('DB_DRIVER', 'mysql');
    define('CHARSET', 'utf8');
}