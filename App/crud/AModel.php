<?php
include './interfaces/IModel.php';
abstract class AModel implements IModel{
    public function __construct(){
        $this->dbConn = (new Db())->getConnection("mysql");
    }
    abstract public function create();
    abstract public function read();
    abstract public function update();
    abstract public function delete();
}