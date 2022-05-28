<?php

include_once("../classes/noticias.classes.php");

    class Noticiacontr extends NoticiaUpMy{
        private $Titulo;
        private $Contenido;
        private $Palabra;
        private $Firma;
        private $Lugar;
        private $Fecha_Noticia;
        private $Hora;
        
        private $id_Noticia;
        private $tipo;




        public function __construct($Titulo,$Contenido,$Palabra,$Firma,$Lugar,$Fecha_Noticia,$Hora,$id_Noticia,$tipo){
            $this->Titulo=$Titulo;
            $this->Contenido=$Contenido;
            $this->Palabra=$Palabra;
            $this->Firma=$Firma;
            $this->Lugar=$Lugar;
            $this->Fecha_Noticia=$Fecha_Noticia;
            $this->Hora=$Hora;
            $this->id_Noticia=$id_Noticia;
            $this->tipo=$tipo;


        }
        public function Noticiaup(){
            //validaciones
            if($this->emptyInputs() == false){
   
                echo '<script type="text/javascript">'; 
                echo 'alert("Hay campos vacios, es necesario tener todos los campos llenos");';
                echo '</script>';
                exit();
            }   
           
        
            $this->NoticiaUpB($this->Titulo,$this->Contenido,$this->Palabra,$this->Firma, $this->Lugar,$this->Fecha_Noticia,$this->Hora,$this->tipo);

        }
        public function NoticiaMejora(){
            //validaciones
            if($this->emptyInputs() == false){
   
                echo '<script type="text/javascript">'; 
                echo 'alert("Hay campos vacios, es necesario tener todos los campos llenos");';
                echo '</script>';
                exit();
            }   
            $this->NoticiaUpdateSql2($this->id_Noticia,$this->Titulo,$this->Contenido,$this->Palabra,$this->Firma, $this->Lugar,$this->Fecha_Noticia,$this->Hora,$this->tipo);

        }


    


        private function emptyInputs(){
            $result;
            if( empty($this->Titulo) || empty($this->Contenido)||  empty($this->Palabra)
            || empty($this->Firma)|| empty($this->Lugar)|| empty($this->Fecha_Noticia)
            || empty($this->Hora))
            {
                $result = false;
            }else {
                $result = true;
            }
            return $result;
        }
 
    }
