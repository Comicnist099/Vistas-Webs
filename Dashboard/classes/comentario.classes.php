<?php

include("../classes/dbh.classes.php");
session_start();
class Comentario extends Dbh
{
   
    function subirComentario($News, $content,$idComentario)
    {
        $Reportero= $_SESSION["user_id"];
        //$stmt = $this->connect()->prepare('INSERT INTO USERS (EMAIL, PASSWORD) VALUES(?, ?)'); 
        //con un STORED PROCEDURE:
        $stmt = $this->connect()->prepare('call PROC_NEWS_COMMENT(?, ?, ?, ?,?)');
        if (!$stmt->execute(array('Insertar', $Reportero, $News, $content,$idComentario))) {
            $stmt = null;
            echo '<script type="text/javascript">';
            echo 'alert("Salio algo mal en la base de datos");';
            echo 'window.location.href = "../viko.php";';
            echo '</script>';
            exit();
        }
        $stmt = null;
    }

    function UpdateComentario($id_Comentario,$Contenido)
    {
        //$stmt = $this->connect()->prepare('INSERT INTO USERS (EMAIL, PASSWORD) VALUES(?, ?)'); 
        //con un STORED PROCEDURE:
        $stmt = $this->connect()->prepare('UPDATE comment SET CONTENT=? WHERE ID_COMMENT=?;');
        if (!$stmt->execute(array($Contenido,$id_Comentario))) {
            $stmt = null;
            echo '<script type="text/javascript">';
            echo 'alert("Salio algo mal en la base de datos");';
            echo 'window.location.href = "../viko.php";';
            echo '</script>';
            exit();
        }
        $stmt = null;
    }



    function eliminar($id_Eliminar)
    {
        //$stmt = $this->connect()->prepare('INSERT INTO USERS (EMAIL, PASSWORD) VALUES(?, ?)'); 
        //con un STORED PROCEDURE:
        $stmt = $this->connect()->prepare('DELETE from comment where FK_COMMENT=? OR ID_COMMENT=?;');
        if (!$stmt->execute(array($id_Eliminar,$id_Eliminar))) {
            $stmt = null;
            echo '<script type="text/javascript">';
            echo 'alert("Salio algo mal en la base de datos");';
            echo 'window.location.href = "../viko.php";';
            echo '</script>';
            exit();
        }
        $stmt = null;
    }

    function eliminarRespuesta($id_Eliminar)
    {
        //$stmt = $this->connect()->prepare('INSERT INTO USERS (EMAIL, PASSWORD) VALUES(?, ?)'); 
        //con un STORED PROCEDURE:
        $stmt = $this->connect()->prepare('delete from comment where ID_COMMENT=?;');
        if (!$stmt->execute(array($id_Eliminar))) {
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