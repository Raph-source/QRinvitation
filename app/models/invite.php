<?php
require_once 'model.php';
class Invite extends Model{
    private $nom;
    private $prenom;
    private $phone;
    private $idQrCode;

    public function setAttribut($nom, $prenom, $phone, $idQrCode){
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->phone = $phone;
        $this->idQrCode = $idQrCode;
        parent::__construct();
    }

    //cette méthode vérifie qu'un numéro de téléphone est unique ou pas
    public function phoneUnique($phone):bool{
        $requete = $this->bdd->prepare("SELECT * FROM invite WHERE numPhone = :numPhone");
        $requete->bindParam(':numPhone', $phone);
        $requete->execute();

        $trouver = $requete->fetchAll();

        if(count($trouver) == 0)
            return true;
        return false;
    }
    public function save():bool{

        try{
            $requete = $this->bdd->prepare("INSERT INTO invite(nom, prenom, numPhone, idCode) 
            VALUES(:nom, :prenom, :numPhone, :idCode)");
        
            $requete->bindParam(':nom', $this->nom);
            $requete->bindParam(':prenom', $this->prenom);
            $requete->bindParam(':numPhone', $this->phone);
            $requete->bindParam(':idCode', $this->idQrCode);

            $requete->execute();

            return true;
        }
        catch(Exception $e){
            return false;
        }

    }

    public function delete($phone):bool{
        try{
            $requete = $this->bdd->prepare("DELETE FROM invite WHERE numPhone = :numPhone");
            $requete->bindParam(':numPhone', $phone);
            $requete->execute();

            return true;
        }
        catch(Exception $e){
            return false;
        }
    }
}