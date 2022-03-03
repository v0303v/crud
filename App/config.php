<?php
include './crud/user.php';

date_default_timezone_set('Asia/Tashkent');



$allowed_extensions =[ "jpeg","jpg", "png", "gif" ];


// $memtypes = [ "jpeg","jpg", "png", "gif" ];


// //check if the file's extension is inarray
// function isInArray($filename, $memtypes) {
//     if(!in_array($filename, $memtypes)){
//         return;
//     } else {
//         echo "error";
//     }
// }



/// uploads


// $exten = 'jgp';
// if(in_array( $exten, $allowed_extensions)){
//         // prodoljit process
// }else{
//     throw Exception('Not Allowed Extention', 33434);
// }


// variables for the form
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname']; 
$filename = $_FILES['filename']; 
$timestamp = new Datetime('now');
$folder = "../uploads/";
$filename = $_FILES['filename']['name'];
$filetmp = $_FILES['filename']['tmp_name'];
$location = $folder.$filename;
$extensions = strtolower(strrchr($filename,"."));
$filepath = $location;

//new create user class 
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (move_uploaded_file($filetmp, $location)) {      
    $insertData = new User($firstname, $lastname, $filename, $extensions, $filepath, $timestamp);
    $insertData->create();
    header('location:./crud/crud.php');
    exit;     
    }
}

//read user table
$display = new User($firstname, $lastname, $filename, $extensions, $filepath, $timestamp);
$sql = $display->read();

//Delete from the table 
$deletion = new User($firstname, $lastname, $filename, $extensions, $filepath, $timestamp);
$deletion->delete();

//update
// $update = new readUser();
// $update->displayOne();
// $update = new updateUser($firstname, $lastname);
// $update->editRecord();




























class File  {
    
    public $file_path = '';
    
    public function __construct($file_path){
         $this->file_path = $file_path;
     
    }
    
    public function  writeFile(){
      $handle =  fopen($this->file_path, 'w+');
    }
    //check if the file is already created 
    public function fileCheck($filename){

        if(!file_exists($filename))
            return false;

            return true;

        $this->filename = $filename;
        //$this->tempname = $_FILES['filename']['tmp_name'];
    }
    
    //check the extension of the file
    public function pathCheck($filename){
        $this->pathcheck = pathinfo($filename,PATHINFO_EXTENSION);
    }

    //check if the file's extension is inarray
    public function isInArray($pathcheck, $memtypes){
        if (!in_array($pathcheck, $memtypes)) {
            return;
        } else {
            // echo error msg;
        }
    }
}
