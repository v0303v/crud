<?php
use phpDocumentor\Reflection\PseudoTypes\True_;
namespace app\crud;
use app\crud\AModel;
use PDO;
class User extends AModel{
    public $firstname;
    public $lastname;
    public $filename;
    public $extensions;
    public $filepath;
    public $dbConn;

    public function __construct($firstname, $lastname, $filename, $extensions, $filepath, $timestamp){
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->filename = $filename;
        $this->extensions = $extensions;  
        $this->timestamp = $timestamp;
        $this->filepath = $filepath;

        parent::__construct();
    }

    public function create(){          
        $insert = "INSERT INTO `data` (fname, lname, extensions, file_name, file_path, created_at) VALUE (:firstname, :lastname, :extensions, :filename, :filepath, :timestamp)";
 
        $sql = $this->dbConn->prepare($insert);
        
        $sql->bindParam(':firstname', $this->firstname, PDO::PARAM_STR);
        $sql->bindParam(':lastname', $this->lastname, PDO::PARAM_STR);
        $sql->bindParam(':extensions', $this->extensions, PDO::PARAM_STR);
        $sql->bindParam(':filename', $this->filename, PDO::PARAM_STR);
        $sql->bindParam(':filepath', $this->filepath, PDO::PARAM_STR);
        $sql->bindParam(':timestamp', $this->timestamp->format('Y-m-d H:i:s'), PDO::PARAM_STR);

        $sql->execute();
    }

    public function read(){
        $select = "SELECT * FROM `data` ORDER BY id DESC";
        $sql = $this->dbConn->prepare($select);    
        
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update(){
        $get = "UPDATE `data` SET firstname=:firstname, lastname=:lastname WHERE id=? ";
        $update = $this->dbConn->prepare($get);
    
        $update->bindParam(':firstname', $this->firstname, PDO::PARAM_STR);
        $update->bindParam(':lastname', $this->lastname, PDO::PARAM_STR);

        $update->execute();

        return true;     
    }

    public function delete(){
        $getid = "DELETE FROM `data` WHERE id=?";
        $sql = $this->dbConn->prepare($getid);
        
        return $sql->execute([$_GET['id']]);
    }
}
