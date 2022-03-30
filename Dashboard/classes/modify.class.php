<?php

include_once( "../classes/dbh.classes.php");

class Modify extends Dbh{

    
    function Modificar($Nombre, $Alias,$correo,$password){

        $stmt = $this->connect()->prepare('call PROC_USER(?,?,?,?,?,?,?,?);');
        $hashPwd = password_hash($password, PASSWORD_DEFAULT);
        if(!$stmt->execute(array('Update',$Nombre,$Alias,$correo,$hashPwd,null, 1, "Activo"))){
            $stmt = null;
            echo '<script type="text/javascript">'; 
            echo 'alert("salio algo mal en la base de datos");';
            echo 'window.location.href = "../login.php";';
            echo '</script>';
            exit();
        }

        $check;
        if($stmt->rowCount() == 0){ //el rowcount == 0 significa que no hay ningun usuario o que no lo encontro
            $stmt = null;
            echo '<script type="text/javascript">'; 
            echo 'alert("Usuario no encontrado");';
            echo 'window.location.href = "../PerfilEditable.php";';
            echo '</script>';
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC); //nos regresara todas las filas que encontro en el query, pero tenemos que darle una manera de como nos lo regresara

        $stmt = null; //mata toda conexion, no hay que dejar conexiones abiertas en php xq luego satura la memoria
    }
}

?>