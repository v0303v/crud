<?php
require_once './dbConnection.php';

class readUser extends dbConnection {
    // display data from table 
    public function __construct()
    {
        parent::__construct();
    }

    public function displayAll(){
        try {
            $sql = "SELECT * FROM `data` ORDER BY id DESC";
            $sql = $this->connection->prepare($sql);    

            // var_dump($sql); die;

            $sql->execute();

            return $sql->fetchAll(PDO::FETCH_ASSOC);
            
        }
        catch (PDOException $exp){
            echo $exp->getMessage();
        } 
    }

    public function displayOne(){
        try {
            $sql = "SELECT * FROM `data` WHERE id =:id";
            $sql = $this->connection->prepare($sql);    

            $sql->bindParam(':id', $_GET['id']);

            $sql->execute();

            return $sql->fetchAll(PDO::FETCH_ASSOC);
            
        }
        catch (PDOException $exp){
            echo $exp->getMessage();
        } 

    }
}




