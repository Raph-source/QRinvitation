<?php
    class Admin{
        private $bdd;

        public function __construct(){
            $this->bdd = new PDO("mysql:host=localhost;dbname=invitation", "root", '');
            
        }

        public function checkAuth($pseudo, $pwd):bool{
            $requete = $this->bdd->prepare("SELECT * FROM admin WHERE pseudo = ? AND pwd = ?");
            $requete->execute([$pseudo, $pwd]);
            
            $trouver = $requete->fetchAll();

            if(count($trouver) != 0)
                return true;
            return false;

        }

    }