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
                $this->post[$key] = htmlspecialchars($_POST[$key]);
                $trouver++;
            }
        }

        if($trouver == $lenArray)
            return true;
        return false;
    }
}
?>