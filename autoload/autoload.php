<?php 

function register(){
    spl_autoload_register(function($className) {
        $file = dirname(__DIR__).DIRECTORY_SEPARATOR.$className.'.php';
            if (file_exists($file)){
                include $file;
            } else{
                throw new Exception("File Not Found In Autoload");
            }
    });
}

register();