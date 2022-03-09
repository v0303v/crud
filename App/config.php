<?php
use Illuminate\Support\Facades\App;




























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
