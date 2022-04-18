
<?php

include_once("../classes/dbh.classes.php");

class Seccion extends Dbh{

     function subirseccion($name,$color, $reportero){
        //$stmt = $this->connect()->prepare('INSERT INTO USERS (EMAIL, PASSWORD) VALUES(?, ?)'); 
        //con un STORED PROCEDURE:
        $stmt = $this->connect()->prepare('call PROC_TAG(?, ?, ?, ?)'); 
        if(!$stmt->execute(array('Insertar',$name,$reportero,$color))){
            $stmt = null;
            echo '<script type="text/javascript">'; 
            echo 'alert("Salio algo mal en la base de datos");';
            echo 'window.location.href = "../viko.php";';
            echo '</script>';
            exit();
        }
        $stmt = null;
    }
    
    function eliminar($name,$color, $reportero){
        //$stmt = $this->connect()->prepare('INSERT INTO USERS (EMAIL, PASSWORD) VALUES(?, ?)'); 
        //con un STORED PROCEDURE:
        $stmt = $this->connect()->prepare('call PROC_TAG(?, ?, ?, ?)'); 
        if(!$stmt->execute(array('Eliminar',$name,$reportero,$color))){
            $stmt = null;
            echo '<script type="text/javascript">'; 
            echo 'alert("Salio algo mal en la base de datos");';
            echo 'window.location.href = "../viko.php";';
            echo '</script>';
            exit();
        }
        $stmt = null;
    }
}
?>