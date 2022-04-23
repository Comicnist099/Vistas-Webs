
<?php

include_once("../classes/dbh.classes.php");
session_start();

class LikeNews extends Dbh{

    function BuscarLike($NewsID){
        $Reportero= $_SESSION["user_id"];
        $stmt = $this->connect()->prepare('SELECT * FROM news_likes WHERE fk_news =  ? AND fk_users=?;');
        if(!$stmt->execute(array($NewsID,$Reportero))){
            $stmt = null;
            echo '<script type="text/javascript">'; 
            echo 'alert("salio algo mal en la base de datos");';
            echo 'window.location.href = "../login.php";';
            echo '</script>';
            exit();
        }

        $check;
        if($stmt->rowCount() !== 0){ //el rowcount == 0 significa que no hay ningun usuario o que no lo encontro
            $stmt = null;
            $stmt = $this->connect()->prepare('CALL PROC_LIKE_NEWS(?, ?, ?)'); 
          
            if(!$stmt->execute(array('NoGusta',$Reportero,$NewsID))){                        
                $stmt = null;
                echo '<script type="text/javascript">'; 
                echo 'alert("Salio algo mal en la base de datos");';
                echo 'window.location.href = "../Crear_Noticia.php";';
                echo '</script>';
                exit();
            }
            echo '<script type="text/javascript">'; 
            echo 'window.location.href = "../NoticiasEntrar_revision.php?id='.$NewsID.'";';
            echo '</script>';
            $stmt = null;

            exit();
        }else{
            $stmt = $this->connect()->prepare('CALL PROC_LIKE_NEWS(?, ?, ?)'); 
      
            if(!$stmt->execute(array('Gusta',$Reportero,$NewsID))){                        
                $stmt = null;
                echo '<script type="text/javascript">'; 
                echo 'alert("Salio algo mal en la base de datos");';
                echo 'window.location.href = "../Crear_Noticia.php";';
                echo '</script>';
       
                echo '<script type="text/javascript">'; 
                echo 'window.location.href = "../NoticiasEntrar_revision.php?id='.$NewsID.'";';
                echo '</script>';
                exit();

            }
            $stmt = null;
 
        }
    }


   

}
?>