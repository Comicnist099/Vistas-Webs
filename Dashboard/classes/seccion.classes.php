
<?php

include_once("../classes/dbh.classes.php");

class Seccion extends Dbh{
    function comprobarNombre($name){
        //$stmt = $this->connect()->prepare('INSERT INTO USERS (EMAIL, PASSWORD) VALUES(?, ?)'); 
        //con un STORED PROCEDURE:
        $stmt = $this->connect()->prepare('SELECT * FROM tag WHERE NAME =  ?;'); 
        if(!$stmt->execute(array($name))){
            $stmt = null;
            echo '<script type="text/javascript">'; 
            echo 'alert("Salio algo mal en la base de datos");';
            echo 'window.location.href = "../secciones.php";';
            echo '</script>';
            exit();
        }
        $check;
        if($stmt->rowCount() >0){ //el rowcount == 0 significa que no hay ningun usuario o que no lo encontro
            $stmt = null;
            echo '<script type="text/javascript">'; 
            echo 'alert("Ya hay una sección con este nombre procura colocar otro tipo de nombre");';
            echo 'window.location.href = "../secciones.php";';
            echo '</script>';
            exit();
        }
    }
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