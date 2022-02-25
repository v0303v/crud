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
            $result = $this->connection->prepare($sql);    

            // var_dump($result); die;

            $result->execute();

            $result->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        catch (PDOException $exp){
            echo $exp->getMessage();
        } 
    }
}