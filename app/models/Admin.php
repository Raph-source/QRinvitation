<?php
    require_once 'model.php';
    require_once 'qrCode.php';
    class Admin extends Model{
        public $qrCode;
        public function __construct(){
            $this->qrCode = new Qr_code();
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