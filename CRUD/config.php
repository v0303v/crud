<?php
include './createUser.php';
include './readUser.php';
include './updateUser.php';
include './deleteUser.php';

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
class userId extends createUser{

    public function getId(){
        try {
            $getid = "SELECT * FROM `data` WHERE id:=id";
            $sql = $this->connection->prepare($getid);

            $sql->execute(); 
            // $fetch=$sql->fetch(PDO::FETCH_ASSOC);
            // return $fetch;
        } 
        catch (PDOException $exp){
            echo $exp->getMessage() . ":<p style='color:red'>get id Error!</p>";
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
