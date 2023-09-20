<?php
    require_once BIBLIOTHEQUE.'phpqrcode/qrlib.php';
    require_once MODEL.'Admin.php';
    require_once 'superGlobal.php';

    class AdminController{
        private $model;
        private $superGlobal;
        public function __construct(){
            $this->model = new Admin();
            $this->superGlobal = new SuperGlobal();
        }
        
        public function getFormAuth(){
            require_once VIEW.'admin/authentification.php';
        }

        public function authentification(){
            if($this->superGlobal->checkPost(['pseudo', 'pwd'])){
                
                //récuperation de valeur du formulaire en les injections
                $pseudo = $this->superGlobal->post['pseudo'];
                $pwd = $this->superGlobal->post['pwd'];

                if($this->model->checkAuth($pseudo, $pwd)){
                    require_once VIEW.'admin/option.php';
                }
                else{
                    $notif = 'pseudo ou mot de passe incorrecte';
                    require_once VIEW.'admin/authentification.php';        
                }
            }
            else{
                $notif = 'pas de champs vide svp !!!';
                require_once VIEW.'admin/authentification.php';
            }
        }

        public function getFormAjouterInvite(){
            require_once VIEW.'admin/ajouterInvite.php';
        }

        public function ajouterInvite(){
            //vérfication des champs
            if($this->superGlobal->checkPost(['nom', 'prenom', 'phone', 'phoneConf'])){
                
                //récuperation de valeur du formulaire en les injections
                $nom = $this->superGlobal->post['nom'];
                $prenom = $this->superGlobal->post['prenom'];
                $phone = $this->superGlobal->post['phone'];
                $phoneConf = $this->superGlobal->post['phoneConf'];

                //contenu, chemin et nom du qrCode
                $contenu = $nom.' '.$prenom.' '.$phone;
                $nomQrCode = $nom.'_'.$prenom.'_'.$phone;

                $chemin = STORAGE.$nomQrCode;
                //véfier que le qrcode n'existe pas
                if(!file_exists($chemin.'.png')){
                    //vérifier l'égalité du numéro et sa confirmation
                    if($phone === $phoneConf){
                        //vérifier que le numéro conforme
                        if(preg_match('/^\+243(97|99|98|81|82|83|84|90){1}\d{7}$/', $phone) && 
                           preg_match('/^\+243(97|99|98|81|82|83|84|90){1}\d{7}$/', $phoneConf)){
                            //génération du QRcode
                            $lienQrCode = STORAGE_LINK.$nomQrCode.'.png';
                            QRcode::png($contenu, $chemin.'.png');
                            //sauvegarde dans la bdd
                            $this->model->qrCode->setChemin($lienQrCode);

                            $notif = "client enregistré avec succès";
                            require_once VIEW.'admin/ajouterInvite.php';
                            
                        }
                        else{
                            $notif = "Numéro mal saisie";
                            require_once VIEW.'admin/ajouterInvite.php';
                        }
                    }
                    else{
                        $notif = "Le numéro est diffèrent du numéro de conformation";
                        require_once VIEW.'admin/ajouterInvite.php';
                    }
                    
                }
                else{
                    $notif = "le client est déjà enregistré";
                    require_once VIEW.'admin/ajouterInvite.php';
                }
                
            }
            else{
                $notif = 'pas de champs vide svp !!!';
                require_once VIEW.'admin/ajouterInvite.php';
            }
        }
    }