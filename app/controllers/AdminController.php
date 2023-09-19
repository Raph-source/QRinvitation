<?php
    require_once(MODEL.'Admin.php');
    class AdminController{
        private $model;
        public function __construct(){
            $this->model = new Admin();
        }
        
    }