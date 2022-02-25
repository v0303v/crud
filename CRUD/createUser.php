<?php
require_once './dbConnection.php';
// save user into database
class createUser extends dbConnection { 
    public $firstname;
    public $lastname;
    public $filename;
    public $extensions;
    public $filepath;
    
    public function __construct($firstname, $lastname, $filename, $extensions, $filepath, $timestamp)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->filename = $filename;
        $this->extensions = $extensions;  
        $this->timestamp = $timestamp;
        $this->filepath = $filepath;
        
        parent::__construct();
        
    } 
    //TODO: filename & filecheck 

    //create a new user
    public function insertData(){
        try{
            $insert = "INSERT INTO `data` (fname, lname, extensions, file_name, file_path, created_at) VALUE (:firstname, :lastname, :extensions, :filename, :filepath, :timestamp)";
            
            
            $sql = $this->connection->prepare($insert);
            
            $sql->bindParam(':firstname', $this->firstname, PDO::PARAM_STR);
            $sql->bindParam(':lastname', $this->lastname , PDO::PARAM_STR);
            $sql->bindParam(':extensions', $this->extensions, PDO::PARAM_STR);
            $sql->bindParam(':filename', $this->filename, PDO::PARAM_STR);
            $sql->bindParam(':filepath', $this->filepath, PDO::PARAM_STR);
            $sql->bindParam(':timestamp', $this->timestamp->format('Y-m-d H:i:s'), PDO::PARAM_STR);

            $sql->execute(); 
        }   
        catch (Exception $exp){
            echo $exp->getMessage() . ":<p style='color:red'>inserting Error!</p>";
        }
    }
}