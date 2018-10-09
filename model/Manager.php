<?php
namespace MonNameSpace;

require_once 'db_config.php'; //db Confing File
/**
 * 
 */
class Manager {
    private $driver;
    private $host;
    private $user;
    private $pass;
    private $database;
    private $charset;
    /**
     * [__construct description]
     */
    public function __construct() {
        //Vacia variabes constantes
        $this->driver   = DB_DRIVER;
        $this->host     = HOST;
        $this->user     = DB_USER;
        $this->pass     = DB_PASSWORD;
        $this->database = DB_NAME;
        $this->charset  = CHARSET;
    }
    /**
     * [DBConnect description]
     */
    protected function DBConnect() {
        $db = new \PDO($this->driver.":host=".$this->host.";dbname=".$this->database.";charset=".$this->charset, $this->user, $this->pass);
        return ($db);
    }
}