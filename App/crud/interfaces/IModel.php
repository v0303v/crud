<?php 
namespace app\crud\interfaces;
interface IModel{
    public function create();
    public function read();
    public function update();
    public function delete();
}