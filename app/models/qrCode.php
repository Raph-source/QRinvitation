<?php
require_once 'model.php';
class Qr_code extends Model{
    public function setChemin($chemin):void{
        $requete = $this->bdd->prepare("INSERT INTO qrCode(path) VALUES(?)");
        $requete->execute([$chemin]);
    }
}