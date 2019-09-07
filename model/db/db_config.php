<?php
// Data Base Config file
if($_SERVER['SERVER_ADDR'] == "217.160.63.209"){
    // Production config DB
    define('HOST','db760642750.hosting-data.io');
    define('DB_USER', 'dbo760642750');
    define('DB_PASSWORD','1qaz0p;/');
    define('DB_NAME','db760642750');
    define('DB_DRIVER','mysql');
    define('CHARSET','utf8');
}else {
    // Developer server
    define('HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'mytemplate');
    define('DB_DRIVER', 'mysql');
    define('CHARSET', 'utf8');
}
