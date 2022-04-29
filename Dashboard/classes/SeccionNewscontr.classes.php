<?php

include_once("../classes/SeccionNews.classes.php");

    class NoticiasSeccioncontr extends SeccionNoticia{
        private $Nombre;
        private $id;

        public function __construct($Nombre,$id){
            $this->Nombre=$Nombre;
            $this->id=$id;

        }
        public function NoticiasSeccion(){
        
            $this->NoticiaSeccionUpB($this->Nombre);
        }

        public function EliminarSeccion(){
            $this->NoticiasSeccionEliminar($this->id);
        }

        public function NoticiasSeccionContr(){

            
            $this->NoticiaSeccionUpdate($this->id,$this->Nombre);
        }
 
    }
