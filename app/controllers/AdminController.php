<?php
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
    }