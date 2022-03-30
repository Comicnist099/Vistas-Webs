<?php
include "../classes/modify.class.php";


class Modifycontr extends Modify {

     
    private $email;
    private $pwd;

    public function __construct($email, $pwd){
        $this->email = $email;
        $this->pwd = $pwd;
        
    }

    public function loginUser(){
        if($this->emptyInputs() == false){
            //echo 'rip en los inputs';
            header("location: ../index.php?error=emptyInputs");
            exit();
        }

        $this->Modificar($this->email, $this->pwd);
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