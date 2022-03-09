<?php
namespace app\database;
use app\database\connections\MysqlConnection;
use app\database\connections\PosgresConnection;

class Db {
    public function getConnection($connectionName){
        if ($connectionName == "mysql"){
            return (new MysqlConnection())->connect();
        } elseif ($connectionName == "posgres"){
            return new PosgresConnection();
        } else {
            return null;
        }
    }   
}