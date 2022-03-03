<?php
include './connections/PostgresConnection.php';
include './connections/MysqlConnection.php';
class Db {
    public function getConnection($connectionName){
        if($connectionName == "mysql"){
            return (new MysqlConnection())->connect();
        }elseif($connectionName == "posgres"){
            return new PosgresConnection();
        } else {
            return null;
        }
    }   
}