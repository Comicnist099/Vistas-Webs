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
            header("location: ../index.php?error=emptyInputs");
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