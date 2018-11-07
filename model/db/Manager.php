<?php
namespace MonNameSpace\db;

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
    private $db;
    /**
     * [__construct description]
     */
    public function __construct() {
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
    protected function dbConnect() {
    	if ($this->db === NULL) {
        	$db = new \PDO($this->driver.":host=".$this->host.";dbname=".$this->database.";charset=".$this->charset, $this->user, $this->pass);
        	$db->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
        	$this->db =$db;
    	}
        return $this->db;
    }
}