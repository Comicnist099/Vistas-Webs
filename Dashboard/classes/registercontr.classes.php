<?php

include "../classes/register.classes.php";

    class RegisterContr extends Register{
        private $Alias;
        private $user;
        private $email;
        private $pwd;
        private $image;
        private $imageId;

        public function __construct($Name,$Alias,$email, $pwd,$Image){
            $this->email = $email;
            $this->pwd = $pwd;
            $this->Alias = $Alias;
            $this->user = $Name;
            $this->image=$Image;
        }
        
        public static function withImage($image){
            $instance = new self();
            $instance->fillWithImage($image);
            return $instance;
        }

        public static function withImageId($imageId){
            $instance = new self();
            $instance->fillWithImageId($imageId);
            return $instance;
        }

        protected function fillWithImage($image){
            $this->image = $image;
        }

        protected function fillWithImageId($imageId){
            $this->imageId = $imageId;
        }

        public function uploadImage(){
            $this->upload($this->image);
        }

        public function searchImage(){
            $this->search($this->imageId);
        }

        public function registerUser(){

            //validaciones


            if($this->emptyInputs() == false){
                //echo 'rip en los inputs';
                //header("location: ../registro.php?error=emptyInputs");

                echo '<script type="text/javascript">'; 
                echo 'alert("Hay campos vacios");';
                echo 'window.location.href = "../registro.php";';
                echo '</script>';

                exit();
            }

            if($this->checkUser($this->email) == false){
                //echo 'rip en los inputs';
                //header("location: ../registro.php?error=userCheck");
                echo '<script type="text/javascript">'; 
                echo 'alert("Ya existe un usuario");';
                echo 'window.location.href = "../registro.php";';
                echo '</script>';

                exit();

            }

            //Registro de usuario

            $this->register($this->user,$this->Alias,$this->email, $this->pwd,$this->image);



           
        }

        private function emptyInputs(){
            $result;
            if( empty($this->email) || empty($this->pwd)){
                $result = false;
            }else {
                $result = true;
            }
            return $result;
        }
    }


?>