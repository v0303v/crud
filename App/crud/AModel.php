<?php
namespace app\crud;
use app\crud\interfaces\IModel;
use app\database\Db;

abstract class AModel implements IModel{
    public function __construct(){
        $this->dbConn = (new Db())->getConnection("mysql");
    }
    abstract public function create();
    abstract public function read();
    abstract public function update();
    abstract public function delete();
}