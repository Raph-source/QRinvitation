<?php
class Model{
    protected $bdd;

    public function __construct(){
        $this->bdd = new PDO("mysql:host=localhost;dbname=invitation", "root", '');
    }
}