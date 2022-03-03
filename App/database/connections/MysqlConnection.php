<?php
include '../interfaces/IConnection.php';
class MysqlConnection implements IConnection{  
    public $host = 'localhost';
    public $root = 'root';
    protected $age = 0;
    public $rootpass = '';
    public $dbName = 'dbcrud';
    public $dbConn = null;
    public function __construct() {
        if($this->dbConn == NULL) {
            try{
                $this->dbConn = new PDO("mysql:host=$this->host; dbname=$this->dbName", $this->root, $this->rootpass);
                $this->dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                // var_dump($this->dbConn); die;
            }
            catch (PDOException $ex){
                echo $ex->getMessage();
            }
        }
	}
    public function connect(){
        return $this->dbConn;
    }

}