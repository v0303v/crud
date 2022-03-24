<?php 
namespace filehandling;
use filehandling\UploadException;

require_once './config.php';

class File {
    public $text = '';
    public $filename;

    public function __construct($filename){
        $this->filename = $filename;
    }
    public function openFile(){
        if(!file_exists($this->filename)){
            return false;
        }

        $text = file_get_contents($this->filename);

        if(!$text){
            return false;
        }
        return $text;

    }
    public function writeFile($text, $folder){
        $this->filename = uniqid().'.txt';

        $open = fopen($this->filename, 'a+');
        fwrite($open, $text);
        
        fclose($open);
        
        copy($this->filename, $folder.$this->filename);
        unlink($this->filename);
    }
}
