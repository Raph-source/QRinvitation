<?php
require_once 'model.php';
class Qr_code extends Model{
    public function __construct(){
        parent::__construct();
    }
    public function setChemin($chemin):void{
        $requete = $this->bdd->prepare("INSERT INTO qrCode(path) VALUES(?)");
        $requete->execute([$chemin]);
    }

    public function getId($chemin):int{
        $requete = $this->bdd->prepare("SELECT id FROM qrCode WHERE path = :path");
        $requete->bindParam(':path', $chemin);
        $requete->execute();

        $trouver = $requete->fetch();

        return $trouver['id'];
    }

    public function deleteAll(){
        $requete = $this->bdd->query("DELETE FROM qrCode WHERE id > 0");

        //supprimer les qrCodes
        $allQrCode = glob(STORAGE.'*');
        foreach($allQrCode as $qrCode){
            unlink($qrCode);
        }

        //remettre l'id client à 1
        $this->bdd->query("ALTER TABLE qrCode AUTO_INCREMENT = 1");

    }
}