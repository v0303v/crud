<?php
include './createUser.php';
include './readUser.php';
include './updateUser.php';
include './deleteUser.php';

date_default_timezone_set('Asia/Tashkent');


// $memtypes = [ "jpeg","jpg", "png", "gif" ];


// //check if the file's extension is inarray
// function isInArray($filename, $memtypes) {
//     if(!in_array($filename, $memtypes)){
//         return;
//     } else {
//         echo "error";
//     }
// }

//variables for the form
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname']; 
$filename = $_FILES['filename']; 
// $filepath = $_POST['filepath'];
$folder = "../uploads/";
    $location = $folder.$filename;


$timestamp = new Datetime('now');
//Create
if($_SERVER['REQUEST_METHOD']=='POST') {
    $filename = $_FILES['filename']['name'];
    $filetmp = $_FILES['filename']['tmp_name'];

    if (move_uploaded_file($filetmp, $location)) {
        $insertData = new createUser($firstname, $lastname, $filename, $extensions, $filepath, $timestamp);
        $insertData->insertData();
        header('location:./crud.php');
        exit;     
    }
}

//Read 
$display = new readUser();
$sql = $display->displayAll();

//Update
$update = new updateUser($firstname, $lastname);
$update->editRecord();

//Delete
$deletion = new deleteUser();
$deletion->deleteRecord();































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
