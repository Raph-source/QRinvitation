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
                    require_once VIEW.'admin/acceuil.php';
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

                            //vérifier que le numéro soit unique
                            if($this->model->invite->phoneUnique($phone)){

                                //génération du QrCode
                                $lienQrCode = STORAGE_LINK.$nomQrCode.'.png';
                                QRcode::png($contenu, $chemin.'.png');


                                //sauvegarde du QrCode dans la bdd
                                $this->model->qrCode->setChemin($lienQrCode);

                                //sauvegarde du client dans la bdd
                                $idQrCode = $this->model->qrCode->getId($lienQrCode);
                                $this->model->invite->setAttribut($nom, $prenom, $phone, $idQrCode);
                                
                                if($this->model->invite->save()){
                                    $notif = "client enregistré avec succès";
                                }
                                else{
                                    $notif = "Une Erreur est survevu";
                                }   

                                require_once VIEW.'admin/ajouterInvite.php';
                            }
                            else{
                                $notif = "il existe déjà un invité avec ce numéro";
                                require_once VIEW.'admin/ajouterInvite.php';
                            } 
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

        public function retourOption(){
            require_once VIEW.'admin/option.php';
        }

        public function getFormSupprimerInvite(){
            require_once VIEW.'admin/supprimerInvite.php';
        }

        public function supprimerInvite(){

            if($this->superGlobal->checkPost(['phone'])){
                $phone = $this->superGlobal->post['phone'];
                //vérifier que le numéro conforme
                if(preg_match('/^\+243(97|99|98|81|82|83|84|90){1}\d{7}$/', $phone)){
                    if(!$this->model->invite->phoneUnique($phone)){
                        if($this->model->invite->delete($phone)){
                            $notif = "client supprimé avec succès";
                        }
                        else{
                            $notif = "Erreur de la supression";
                        }
                        require_once VIEW.'admin/supprimerInvite.php';

                    }
                    else{
                        $notif = "Aucun client n'a ce numéro";
                        require_once VIEW.'admin/supprimerInvite.php';                    
                    }
                }
                else{
                    $notif = "Numéro non valide";
                    require_once VIEW.'admin/supprimerInvite.php';                      
                }

            }
            else{
                $notif = "Pas de champs vide svp !!!";
                require_once VIEW.'admin/supprimerInvite.php';
            }
        }

        public function getFormConfirme(){
            require_once VIEW.'admin/confirmeInvite.php';
        }

        public function confirmeInvite(){

            if($this->superGlobal->checkPost(['phone'])){
                $phone = $this->superGlobal->post['phone'];
                //vérifier que le numéro conforme
                if(preg_match('/^\+243(97|99|98|81|82|83|84|90){1}\d{7}$/', $phone)){
                    if(!$this->model->invite->phoneUnique($phone)){
                        
                        $trouver = $this->model->invite->find($phone);
                        $lienQrCode = $trouver['path'];

                        require_once VIEW.'admin/confirmeInvite.php';

                    }
                    else{
                        $notif = "Aucun client n'a ce numéro";
                        require_once VIEW.'admin/confirmeInvite.php';                    
                    }
                }
                else{
                    $notif = "Numéro non valide";
                    require_once VIEW.'admin/confirmeInvite.php';                      
                }

            }
            else{
                $notif = "Pas de champs vide svp !!!";
                require_once VIEW.'admin/confirmeInvite.php';
            }

        }

        public function voirToutInvite(){
            if($this->superGlobal->checkGet(['page'])){
                
                $nombreInviteParPage = 2;//nombre d'invité par page
                $nombrePage = ceil($this->model->invite->getNombrePage() / $nombreInviteParPage);//nombre de page dans la pagination
                
                $pageCourante = intval($this->superGlobal->get['page']);

                $debut = ($pageCourante - 1) * $nombreInviteParPage;
                echo $debut; exit;
                $trouver = $this->model->invite->getInvitePaginate($debut, $nombreInviteParPage);
                
                
                require_once VIEW.'admin/voirToutInvite.php';

            }
            else{
                require_once VIEW.'_404.php';
            }

        }

        public function _404(){
            require_once VIEW.'_404.php';
        }
    }