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
            //récuperation de l'id du code QR
            $requete = $this->bdd->prepare("SELECT i.idCode, q.path FROM invite AS i
                        INNER JOIN  qrCode AS q ON i.idCode = q.id 
                        WHERE i.numPhone = :phone");

            $requete->bindParam(':phone', $phone);
            $requete->execute();

            $idQrCode = $requete->fetch()['idCode'];
            $path = $requete->fetch()['path'];

            //suppression de l'invité
            $requete = $this->bdd->prepare("DELETE FROM invite WHERE numPhone = :numPhone");
            $requete->bindParam(':numPhone', $phone);
            $requete->execute();

            //suppression du qrCode
            $requete = $this->bdd->prepare("DELETE FROM qrCode WHERE id = :idQrCode");
            $requete->bindParam(':idQrCode', $idQrCode);
            $requete->execute();

            //suppression du qrCode 
            unlink($path);

            return true;
        }
        catch(Exception $e){
            return false;
        }
    }

    public function find($phone):array{
        $requete = $this->bdd->prepare("SELECT path FROM invite AS i
                INNER JOIN qrCode AS q ON i.idCode = q.id
                WHERE numPhone = :numPhone");

        $requete->bindParam(':numPhone', $phone);
        $requete->execute();

        $trouver = $requete->fetch();

        return $trouver;
    }

    public function getInvitePaginate($debut, $nombreInvite):array{
        $requete = $this->bdd->query("SELECT * FROM invite AS i
                    INNER JOIN qrCode AS q ON i.idCode = q.id LIMIT $debut, $nombreInvite");
        $trouver = $requete->fetchAll();

        return $trouver;
    }

    public function getNombrePage():int{
        $requete = $this->bdd->query("SELECT COUNT(i.id) AS nombre FROM invite AS i
        INNER JOIN qrCode AS q ON i.idCode = q.id");
        
        return $requete->fetch()['nombre'];
    }

    public function noEmpty():bool{
        $requete = $this->bdd->query("SELECT COUNT(*) AS nombre FROM invite");
        
        $nombre = $requete->fetch()['nombre'];

        if($nombre != 0)
            return true;
        return false;
    }

    public function deleteAll(){
        $this->bdd->query("DELETE FROM invite WHERE id > 0");

        $this->bdd->query("DELETE FROM qrCode WHERE id > 0");

        //supprimer les qrCodes
        $allQrCode = glob(STORAGE.'*');
        foreach($allQrCode as $qrCode){
            unlink($qrCode);
        }

        //remettre l'id client à 1
        $this->bdd->query("ALTER TABLE invite AUTO_INCREMENT = 1");
        $this->bdd->query("ALTER TABLE qrCode AUTO_INCREMENT = 1");

    }

    public function getNombreInvite():int{
        $requete = $this->bdd->query("SELECT COUNT(*) AS nombre FROM invite");
        
        return $requete->fetch()['nombre'];

    }

}