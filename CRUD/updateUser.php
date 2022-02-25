<?php
require_once './dbConnection.php';

class updateUser extends dbConnection {

    public function editRecord(){
        try {
            $get = "UPDATE `data` SET firstname=?, lastname=? WHERE id=? ";
            $sql = $this->connection->prepare($get);
    
            $sql->bindParam(':firstname', $this->firstname, PDO::PARAM_STR);
            $sql->bindParam(':lastname', $this->lastname, PDO::PARAM_STR);
            
            $sql->execute();      
        }
        catch (PDOException $exp){
            echo $exp->getMessage(). ":<p style='color:red'>editing Error!</p>";
            echo $exp->getTrace();
        }
    }
}