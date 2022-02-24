<?php
require './dbConnection.php';
// save user into database
class createUser extends dbConnection { 
    public $firstname;
    public $lastname;
    public $filename;
    public $extensions;
    // public $memtypes = [ "jpeg","jpg", "png", "gif" ];
    // public $tempname;
    // public $extcheck;

    public function __construct($firstname, $lastname, $filename, $extensions)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->filename = $filename;
        $this->extensions = $extensions;  

        parent::__construct();
    } 
    //TODO: filename & filecheck 


    //create a new user
    public function insertData(){
        try{
            $insert = "INSERT INTO `data` (fname, lname, extensions, file_name) VALUE (:firstname, :lastname, :extensions, :filename)";

            $sql = $this->connection->prepare($insert);
            
            $sql->bindParam(':firstname', $_POST['firstname'], PDO::PARAM_STR);
            $sql->bindParam(':lastname', $_POST['lastname'], PDO::PARAM_STR);
            $sql->bindParam(':extensions', $this->extensions, PDO::PARAM_STR);
            $sql->bindParam(':filename', $_POST['filename'], PDO::PARAM_STR);

            // var_dump($sql); die;
                $sql->execute(); // <-error
            // var_dump($sql); die;
            
        }   
        catch (Exception $exp){
            echo $exp->getMessage() . ":<p style='color:red'>inserting Error!</p>";
        }
    }
}