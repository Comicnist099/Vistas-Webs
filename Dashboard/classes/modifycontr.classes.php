<?php

include_once ("../classes/modify.class.php");

class Modifycontr extends Modify {

    private $name;
    private $Alias;
    private $correo;
    private $pwd;


    public function __construct($name,$Alias,$correo, $pwd){
        $this->name = $name;
        $this->pwd = $pwd;
        $this->Alias=$Alias;
        $this->correo=$correo;
        
    }

    public function modifyUser(){
        if($this->emptyInputs() == false){
            //echo 'rip en los inputs';
            echo '<script type="text/javascript">'; 
            echo 'alert("No deje espacios vacios");';
            header("location: ../perfilEditable.php?error=emptyInputs");
            echo '</script>';
            exit();
        }




        $pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';

        if (preg_match($pattern, $this->correo) === 1) {
       
        }else{
            echo '<script type="text/javascript">'; 
            echo 'alert("El Email no cumple con las caracteristicas especificas");';
            echo 'window.location.href = "../PerfilEditable.php";';
            echo '</script>';
            exit();
        }
    
        if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $this->pwd)) {
            echo '<script type="text/javascript">'; 
            echo 'alert("Las caracteristicas de la contraseña son incorrectas");';
            echo 'window.location.href = "../PerfilEditable.php";';
            echo '</script>';               
            exit();
    
           } 

        $this->Modificar($this->name,$this->Alias, $this->correo, $this->pwd);
    }

    private function emptyInputs(){
        $result;
        if( empty($this->name) || empty($this->Alias) ||empty($this->correo) || empty($this->pwd)){
            
            $result = false;
        }else {
            $result = true;
        }
        return $result;
    }

    



    
}


?>