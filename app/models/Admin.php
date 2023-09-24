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

        public function checkPwd($oldPwd):bool{
            $requete = $this->bdd->prepare("SELECT * FROM admin WHERE pwd = :pwd");
            $requete->bindParam(':pwd', $oldPwd);
            $requete->execute();
            
            $trouver = $requete->fetchAll();
            if(count($trouver) != 0)
                return true;
            return false;            
        }

        public function changePwd($oldPwd, $newPwd){
            try{
                $requete = $this->bdd->prepare("UPDATE admin SET pwd = :newPwd WHERE pwd = :oldPwd");
                $requete->bindParam(':newPwd', $newPwd);
                $requete->bindParam(':oldPwd', $oldPwd);
                $requete->execute();
            }
            catch(Exception $e){
                echo $e->getMessage();
            }
        }

    }