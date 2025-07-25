<?php
    class Routeur{
        private $request;//l'url demandé

        //le tableau des URLs, controleurs et leurs méthodes
        private $allRequest;
       
        public function __construct($request){
            $this->request = $request;
            $this->allRequest = [
                'AdminController' => [
                    'home' => 'getFormAuth',
                    'authentification-administrateur' => 'authentification',
                    'ajouter-invite' => 'getFormAjouterInvite',
                    'form-ajout-invite' => 'ajouterInvite',
                    'retour-option' => 'retourOption',
                    'supprimer-invite' => 'getFormSupprimerInvite',
                    'formulaire-supprimer-invite' => 'supprimerInvite',
                    'confirmer-invite' => 'getFormConfirme',
                    'formulaire-confirme-invite' => 'confirmeInvite',
                    'voir-tout-invite' => 'voirToutInvite',
                    'modifier-pwd' => 'getModifierPwd',
                    'formulaire-modifier-pwd' => 'modifierPwd',
                    'supprimer-tout-invite' => 'supprimerToutInvite',
                    'deconnexion' => 'deconnexion',
                    'Erreur404' => '_404'
                ]
            ];
        }
        //cette fonction renvoi au controleur demandé
        public function goToController(){
            //inclusion des controleurs
            require_once(CONTROLLER.'AdminController.php');

            //instantiation du controleur et déclanchement de la méthode
            $_404 = false;
            foreach($this->allRequest as $controller => $url_controller){
                if(key_exists($this->request, $url_controller)){
                    $methode = $url_controller[$this->request];
                    $classeController = new $controller();//instantiation du controleur
                    $classeController->$methode();//déclanchement de la méthode
                    $_404 = true;

                    break;
                }
            }

            if(!$_404)
                header('Location: Erreur404');
        }   
    }