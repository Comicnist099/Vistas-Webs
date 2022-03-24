<?php


include "../classes/register.classes.php";

    class RegisterContr extends Register{

        private $Name
        private $Alias
        private $email;
        private $pwd;
        private $image;
        private $imageId;

        public function __construct($email, $pwd){
            $this->email = $email;
            $this->pwd = $pwd;
        }

        public function registerUser(){

            //validaciones


            if($this->emptyInputs() == false){

    
                echo '<script type="text/javascript">'; 
                echo 'alert("Hay campos vacios");';
                echo 'window.location.href = "../registro.php";';
                echo '</script>';

                exit();
            }

            if($this->checkUser($this->email) == false){

                echo '<script type="text/javascript">'; 
                echo 'alert("Ya existe un usuario");';
                echo 'window.location.href = "../registro.php";';
                echo '</script>';

                exit();

            }

            //Registro de usuario

            $this->register($this->email, $this->pwd, $this->imageId);
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