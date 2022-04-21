
<?php

include_once("../classes/dbh.classes.php");

class SeccionNoticia extends Dbh{
  
    protected function NoticiaSeccionUpB($Nombre){
        //$stmt = $this->connect()->prepare('INSERT INTO USERS (EMAIL, PASSWORD) VALUES(?, ?)'); 
        //con un STORED PROCEDURE:
        $stmt = $this->connect()->prepare('CALL PROC_NEWSECCION(?, ?)'); 
      
        if(!$stmt->execute(array('Insertar',$Nombre))){                        
            $stmt = null;
            echo '<script type="text/javascript">'; 
            echo 'alert("Salio algo mal en la base de datos");';
            echo 'window.location.href = "../Crear_Noticia.php";';
            echo '</script>';
            exit();
        }
        $stmt = null;
    }
}
?>