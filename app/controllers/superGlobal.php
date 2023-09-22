<?php
class SuperGlobal{
    public $post = [];
    public $get = [];

    /*cette méthode permet vérifier que tout les champs d'une formulaire 
    post ont été bien remplies puis les ajoutes à l'attribut post*/
    public function checkPost($arrayOfKeys):bool{
        $trouver = 0;
        $lenArray = count($arrayOfKeys);

        foreach($arrayOfKeys as $key){
            if(!empty($_POST[$key])){
                $this->post[$key] = escapeshellcmd(htmlspecialchars($_POST[$key]));
                $trouver++;
            }
        }

        if($trouver == $lenArray)
            return true;
        return false;
    }

    public function checkGet($arrayOfKeys):bool{
        $trouver = 0;
        $lenArray = count($arrayOfKeys);

        foreach($arrayOfKeys as $key){
            if(isset($_GET[$key])){
                $this->get[$key] = escapeshellcmd(htmlspecialchars($_GET[$key]));
                $trouver++;
            }
        }

        if($trouver == $lenArray)
            return true;
        return false;
    }
}
?>