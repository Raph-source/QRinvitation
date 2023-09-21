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
}