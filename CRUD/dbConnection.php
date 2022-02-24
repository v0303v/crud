<?php
//to connect to localhost
class dbConnection{
    public $host = 'localhost';
    public $root = 'root';
    public $rootpass = '';
    public $dbName = 'dbcrud';

    public function __construct()
    {
        try{
            $this->connection = new PDO("mysql:host=$this->host; dbname=$this->dbName", $this->root, $this->rootpass);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $exp){
            echo $exp->getMessage();
        }
    } 
}