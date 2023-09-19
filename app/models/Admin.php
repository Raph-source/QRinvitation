<?php
    class Admin{
        private $bdd;

        public function __construct(){
            $this->bdd = new PDO("mysql:host=localhost;dbname=bdd", "user", 'password');
            
        }

    }