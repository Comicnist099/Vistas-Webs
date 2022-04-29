
<?php

include_once("../classes/dbh.classes.php");

class NoticiaUpMy extends Dbh{
  
    protected function NoticiaUpB($Titulo,$Contenido,$Palabra,$Firma,$Lugar,$Fecha_Noticia,$Hora){
        //$stmt = $this->connect()->prepare('INSERT INTO USERS (EMAIL, PASSWORD) VALUES(?, ?)'); 
        //con un STORED PROCEDURE:

        $Reportero= $_SESSION["user_id"];
        $stmt = $this->connect()->prepare('CALL PROC_NEWS(?, ?, ?, ?, ?, ?, ?, ?, ?,?)'); 
      
        if(!$stmt->execute(array('Insertar',null,$Titulo,$Fecha_Noticia,$Lugar,$Contenido,$Reportero,$Palabra,$Firma,$Hora))){                        
            $stmt = null;
            echo '<script type="text/javascript">'; 
            echo 'alert("Salio algo mal en la base de datos");';
            echo 'window.location.href = "../Crear_Noticia.php";';
            echo '</script>';
            exit();
        }
        $stmt = null;
    }

     function NoticiaUpdateSql2($id_Noticia,$Titulo,$Contenido,$Palabra,$Firma,$Lugar,$Fecha_Noticia,$Hora){
        //$stmt = $this->connect()->prepare('INSERT INTO USERS (EMAIL, PASSWORD) VALUES(?, ?)'); 
        //con un STORED PROCEDURE:
        $stmt = $this->connect()->prepare('UPDATE news SET TITLE=?,CONTENIDO=?,KEYWORD=?, SIGN_REPORTER=?,LOCATION=?,NEWS_DATE=?,HORA=?,Comentario=? ,STATE=? WHERE ID_NEWS =?;'); 
        if(!$stmt->execute(array($Titulo,$Contenido,$Palabra,$Firma,$Lugar,$Fecha_Noticia,$Hora,'',"Revision",$id_Noticia,))){                        
            $stmt = null;
            echo '<script type="text/javascript">'; 
            echo 'alert("Salio algo mal en la base de datos");';
            echo 'window.location.href = "../Crear_Noticia.php";';
            echo '</script>';
            exit();
        }
        $stmt = null;
    }

    
    function NoticiaBajar($Comentario,$id_Noticia){
        //$stmt = $this->connect()->prepare('INSERT INTO USERS (EMAIL, PASSWORD) VALUES(?, ?)'); 
        //con un STORED PROCEDURE:

        $stmt = $this->connect()->prepare('UPDATE news SET STATE=?, Comentario=? WHERE ID_NEWS =?;'); 
      
        if(!$stmt->execute(array("Bajada",$Comentario,$id_Noticia))){                        
            $stmt = null;
            echo '<script type="text/javascript">'; 
            echo 'alert("Salio algo mal en la base de datos");';
            echo 'window.location.href = "../Crear_Noticia.php";';
            echo '</script>';
            exit();
        }
        $stmt = null;
    }

    function NoticiaEliminar($id_Noticia){
        //$stmt = $this->connect()->prepare('INSERT INTO USERS (EMAIL, PASSWORD) VALUES(?, ?)'); 
        //con un STORED PROCEDURE:

        $stmt = $this->connect()->prepare('call PROC_ELIMINAR_NEWS(?,?)'); 
      
        if(!$stmt->execute(array("Gusta",$id_Noticia))){                        
            $stmt = null;
            echo '<script type="text/javascript">'; 
            echo 'alert("Salio algo mal en la base de datos");';
            echo 'window.location.href = "../Perfil.php";';
            echo '</script>';
            exit();
        }
        $stmt = null;
    }





}
?>