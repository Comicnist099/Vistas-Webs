<?php

include_once("../classes/register.classes.php");

    class RegisterContr extends Register{
        private $Alias;
        private $user;
        private $email;
        private $pwd;
        private $pwd1;
        private $blob_img;
        private $id_Usuario;
        private $image;
        private $imageId;

        public function __construct($Name,$Alias,$email, $pwd,$pwd1){
            $this->email = $email;
            $this->pwd = $pwd;
            $this->Alias = $Alias;
            $this->user = $Name;
            $this->pwd1=$pwd1;
        }

        public function registerUser(){
            //validaciones
            if($this->emptyInputs() == false){
                //echo 'rip en los inputs';
                //header("location: ../registro.php?error=emptyInputs");

                echo '<script type="text/javascript">'; 
                echo 'alert("Hay campos vacios");';
                echo 'window.location.href = "../viko.php";';
                echo '</script>';
                exit();
            }
            if($this->checkUser($this->email) == false){
                //echo 'rip en los inputs';
                //header("location: ../registro.php?error=userCheck");
                echo '<script type="text/javascript">'; 
                echo 'alert("Ya existe un usuario");';
                echo 'window.location.href = "../viko.php";';
                echo '</script>';

                exit();

            }

            $pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';

            if (preg_match($pattern, $this->email) === 1) {
           
            }else{
                echo '<script type="text/javascript">'; 
                echo 'alert("El Email esta mal");';
                echo 'window.location.href = "../viko.php";';
                echo '</script>';
                exit();
            }
            if($this->pwd!=$this->pwd1){
                echo '<script type="text/javascript">'; 
                echo 'alert("La contraseña no son iguales");';
                echo 'window.location.href = "../viko.php";';
                echo '</script>';
                exit();
            }
            
            if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $this->pwd1)) {
                echo '<script type="text/javascript">'; 
                echo 'alert("Las caracteristicas de la contraseña son incorrectas");';
                echo 'window.location.href = "../viko.php";';
                echo '</script>';               
                exit();

               } 

           

           
            //Registro de usuario

            $this->register($this->user,$this->Alias,$this->email, $this->pwd);

           
        }

        private function emptyInputs(){
            $result;
            if( empty($this->user) || empty($this->Alias) || empty($this->email) || empty($this->pwd)){
                $result = false;
            }else {
                $result = true;
            }
            return $result;
        }
    }


?>