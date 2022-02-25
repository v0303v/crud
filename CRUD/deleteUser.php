<?php 
require_once './dbConnection.php';

class deleteUser extends dbConnection {

    public function deleteRecord(){
        try {
            $getid = "DELETE FROM `data` WHERE id=?";
            $sql = $this->connection->prepare($getid);
            
            return $sql->execute([$_GET['id']]);
            
        } 
        catch (PDOException $exp){
            echo $exp->getMessage() . ":<p style='color:red'>delete error!</p>";
        }
              
    }
}



