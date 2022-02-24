<?php
include './createUser.php';
// //check if the file is already created 
    // public function fileCheck($filename){

    //     if(!file_exists($filename))
    //         return false;

    //         return true;

    //     $this->filename = $filename;
    //     //$this->tempname = $_FILES['filename']['tmp_name'];
    // }
    
    // //check the extension of the file
    // public function pathCheck($filename){
    //     $this->pathcheck = pathinfo($filename,PATHINFO_EXTENSION);
    // }

    // //check if the file's extension is inarray
    // public function isInArray($pathcheck, $memtypes){
    //     if (!in_array($pathcheck, $memtypes)) {
    //         return;
    //     } else {
    //         // echo error msg;
    //     }
    // }

class displayUser extends dbConnection {
    // display data from table 
    public function __construct()
    {
        parent::__construct();
    }

    public function displayAll(){
        try {
            $sql = "SELECT * FROM `data`";
            $result = $this->connection->prepare($sql);      // error with the database 

            // var_dump($result); die;

            $result->execute();

            $row= $result->fetch(PDO::FETCH_ASSOC);
            return $row;
        }
        catch (PDOException $exp){
            echo $exp->getMessage();
        } 
    }
}

class userId extends createUser{

    public function getId(){
        try {
            $getid = "SELECT * FROM `data` WHERE id:=id";
            $sql = $this->connection->prepare($getid);

            $sql->execute(); 
            $fetch=$sql->fetch(PDO::FETCH_ASSOC);
            return $fetch;
        } 
        catch (PDOException $exp){
            echo $exp->getMessage() . ":<p style='color:red'>get id Error!</p>";
        }
        
    }
}

class userDeleted extends createUser {

    public function deleteRecord(){
        try {
            $getid = "DELETE FROM `data` WHERE id:=id";
            $sql = $this->connection->prepare($getid);

            $sql->execute(); 
        
            return true;  
        } 
        catch (PDOException $exp){
            echo $exp->getMessage() . ":<p style='color:red'>delete error!</p>";
        }
              
    }
}

class userEdit extends createUser {
    
    public function editRecord(){
        try {
            $get = " UPDATE `data` SET fname=:firstname, lname=:lastname, extensions=:extensions, file_name=:filename, 
            -- created_at=:timestamp 
            WHERE id=:id ";
            $sql = $this->connection->prepare($get);
    
            $sql->bindParam(':fname', $_POST['firstname'], PDO::PARAM_STR);
            $sql->bindParam(':lname', $_POST['lastname'],PDO::PARAM_STR);
            // $sql->bindParam(':created_at', $_POST['timestamp'],PDO::PARAM_STR);
            $sql->bindParam(':file_name', $_POST['filename'],PDO::PARAM_STR);
            $sql->bindParam(':extensions', $_POST['extensions'],PDO::PARAM_STR);
            // $sql->bindParam(':id', $id, PDO::PARAM_INT); // "lack of ids"

            $sql->execute(); 

        
        }
        catch (PDOException $exp){
            echo $exp->getMessage(). ":<p style='color:red'>editing Error!</p>";
        }
    }
}

class File  {
    
    public $file_path = '';
    
    public function __construct($file_path){
         $this->file_path = $file_path;
     
    }
    
    public function  writeFile(){
      $handle =  fopen($this->file_path, 'w+');
    }
}



//edit for admins
// extensions for admins
// if (isset($_GET['edit'])) {
//     $id = $_GET['edit'];
//     $update = true;
//     $result = $mysqli->query("SELECT * FROM data WHERE id=$id") or die(mysqli_error($mysqli));

//     if (count($result) == 1) {
//         $row = $result->fetch_array();
//         $fname = $row['fname'];
//         $lname = $row['lname'];
//     }
// }
// //update throught update button
// if (isset($_POST['update'])) {
//     $id = $_POST['id'];
//     $fname = $_POST['fname'];
//     $lname = $_POST['lname'];

//     $mysqli->query("UPDATE data SET fname='$fname', lname='$lname' WHERE id=$id") or die(mysqli_error($mysqli));

//     $_SESSION['message'] = "Record has been updated!";
//     $_SESSION['msg_type'] = "warning";

//     header('location: crud.php');
// }
