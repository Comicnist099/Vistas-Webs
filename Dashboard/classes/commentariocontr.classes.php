<?php

include_once("../classes/comentario.classes.php");

    class Comentariocontr extends Comentario{
        private $contenido;
        private $newsId;


        public function __construct($contenido,$newsId){
            $this->contenido = $contenido;
            $this->newsId = $newsId;

        }

        public function ComentarioUp(){
            //validaciones
            if($this->emptyInputs() == false){
   
                echo '<script type="text/javascript">'; 
                echo 'alert("Hay campos vacios");';
                echo 'window.location.href = "../secciones.php";';
                echo '</script>';
                exit();
            }                                                              

            $this->subirComentario($this->newsId,$this->contenido);                                                                 
        }


        private function emptyInputs(){
            $result;
            if( empty($this->contenido) || empty($this->newsId)){
                $result = false;
            }else {
                $result = true;
            }
            return $result;
        }
    }


?>