<?php
    require_once 'model.php';
    require_once 'qrCode.php';
    require_once 'invite.php';

    class Admin extends Model{
        public $qrCode;
        public $invite;
        public function __construct(){
            $this->qrCode = new Qr_code();
            $this->invite = new Invite();
            parent::__construct();
        }

        public function checkAuth($pseudo, $pwd):bool{
            $requete = $this->bdd->prepare("SELECT * FROM admin WHERE pseudo = :pseudo AND pwd = :pwd");
            $requete->bindParam(':pseudo', $pseudo);
            $requete->bindParam(':pwd', $pwd);
            $requete->execute();
            
            $trouver = $requete->fetchAll();

            if(count($trouver) != 0)
                return true;
            return false;

        }

    }