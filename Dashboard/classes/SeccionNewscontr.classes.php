<?php

include_once("../classes/SeccionNews.classes.php");

    class NoticiasSeccioncontr extends SeccionNoticia{
        private $Nombre;

        public function __construct($Nombre){
            $this->Nombre=$Nombre;

        }
        public function NoticiasSeccion(){
        
            $this->NoticiaSeccionUpB($this->Nombre);
        }
 
    }
