
<?php

include_once("../classes/dbh.classes.php");
session_start();
class Comentario extends Dbh
{
   
    function subirComentario($News, $content)
    {
        $Reportero= $_SESSION["user_id"];
        //$stmt = $this->connect()->prepare('INSERT INTO USERS (EMAIL, PASSWORD) VALUES(?, ?)'); 
        //con un STORED PROCEDURE:
        $stmt = $this->connect()->prepare('call PROC_NEWS_COMMENT(?, ?, ?, ?)');
        if (!$stmt->execute(array('Insertar', $Reportero, $News, $content))) {
            $stmt = null;
            echo '<script type="text/javascript">';
            echo 'alert("Salio algo mal en la base de datos");';
            echo 'window.location.href = "../viko.php";';
            echo '</script>';
            exit();
        }
        $stmt = null;
    }

    function eliminar($name, $color, $reportero)
    {
        //$stmt = $this->connect()->prepare('INSERT INTO USERS (EMAIL, PASSWORD) VALUES(?, ?)'); 
        //con un STORED PROCEDURE:
        $stmt = $this->connect()->prepare('call PROC_TAG(?, ?, ?, ?)');
        if (!$stmt->execute(array('Eliminar', $name, $reportero, $color))) {
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