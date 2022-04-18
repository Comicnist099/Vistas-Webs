<?php

include_once("../classes/seccion.classes.php");

    class Sessioncontr extends Seccion{
        private $name;
        private $color;
        private $reportero;


        public function __construct($name,$color,$reportero){
            $this->name = $name;
            $this->color = $color;
            $this->reportero=$reportero;

        }

        public function registerUser(){
            //validaciones
            if($this->emptyInputs() == false){
   
                echo '<script type="text/javascript">'; 
                echo 'alert("Hay campos vacios");';
                echo 'window.location.href = "../secciones.php";';
                echo '</script>';
                exit();
            }  
            $this->comprobarNombre($this->name);                                                                 

            $this->subirseccion($this->name,$this->color,$this->reportero);                                                                 
        }


        
        public function EliminarSeccion(){
            //validaciones
            if($this->emptyInputs() == false){
   
                echo '<script type="text/javascript">'; 
                echo 'alert("Hay campos vacios");';
                echo 'window.location.href = "../secciones.php";';
                echo '</script>';
                exit();
            }  

            $this->Eliminar($this->name,$this->color,$this->reportero);                                                                 
        }


        private function emptyInputs(){
            $result;
            if( empty($this->name) || empty($this->color)){
                $result = false;
            }else {
                $result = true;
            }
            return $result;
        }
        private function emptyInputs2(){
            $result;
            if( empty($this->name) ){
                $result = false;
            }else {
                $result = true;
            }
            return $result;
        }
    }


?>