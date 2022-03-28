<?php

include_once("../classes/register.classes.php");

    class RegisterContr extends Register{
        private $Alias;
        private $user;
        private $email;
        private $pwd;
        private $blob_img;
        private $id_Usuario;
        private $image;
        private $imageId;

        public function __construct($Name,$Alias,$email, $pwd){
            $this->email = $email;
            $this->pwd = $pwd;
            $this->Alias = $Alias;
            $this->user = $Name;
        }
        
        function set_idUsuario($id_Usuario) { $this->id_Usuario = $id_Usuario; }
        function get_idUsuario() { return $this->id_Usuario; }

        function set_user($user) { $this->user = $user; }
        function get_user() { return $this->user; }

        function set_Alias($Alias) { $this->Alias = $Alias; }
        function get_Alias() { return $this->Alias; }
        
        function set_pwd($pass) { $this->pwd = $pass; }
        function get_pwd() { return $this->pwd; }

        function set_Email($email) { $this->email = $email;}
        function get_Email() { return $this->email; }

        function set_img($blob_img) { $this->blob_img = $blob_img; }
        function get_img() { return $this->blob_img; }

        
    

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

            $this->register($this->user,$this->Alias,$this->email, $this->pwd);



           
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