
<?php

include "../classes/dbh.classes.php";

class Register extends Dbh{

    protected function checkUser($email){ // --; DELETE FROM USERS (tumba todos los usuarios, es SQL INYECTION)
        $stmt = $this->connect()->prepare('SELECT CORREO FROM USER WHERE CORREO = ?;'); //en la wildcard "= ?;" ahi se reemplaza info
        if(!$stmt->execute(array($email))){
            $stmt = null;

            echo '<script type="text/javascript">'; 
            echo 'alert("Error stmt fallo");';
            echo 'window.location.href = "../registro.php";';
            echo '</script>';

            exit();
        }
        $check;
        if($stmt->rowCount() > 0){

            $check = false;
        }else{
            $check = true;
        }
        return $check;

    }

    protected function register($Name,$Alias,$email, $password,$image){
        //$stmt = $this->connect()->prepare('INSERT INTO USERS (EMAIL, PASSWORD) VALUES(?, ?)'); 
        //con un STORED PROCEDURE:
        $stmt = $this->connect()->prepare('CALL PROC_USER(?, ?, ?, ?, ?, ?, ?, ?)'); 

        $hashPwd = password_hash($password, PASSWORD_DEFAULT);
        if(!$stmt->execute(array('Insertar',$Name,$Alias,$email,$hashPwd,$image, 1, "Activo"))){
            $stmt = null;
            echo '<script type="text/javascript">'; 
            echo 'alert("Salio algo mal en la base de datos");';
            echo 'window.location.href = "../registro.php";';
            echo '</script>';
            exit();
        }
        $stmt = null;

    }

    
protected function upload($image){
    $stmt = $this->connect()->prepare('CALL PROC_USER(?, ?, ?, ?, ?, ?, ?, ?)');
    if(!$stmt->execute(array('UpdateFoto','','','', $image, '', ''))){
        $stmt = null;
        header("location: ../index.php?error=stmtfailed");
        exit();
    }
    $stmt = null;
}

protected function search($imageId){
    $stmt = $this->connect()->prepare('CALL PROC_USER(?, ?, ?, ?. ?, ? ,?, ? )');
    if(!$stmt->execute(array('SelectFoto','','','', $imageId, '', ''))){
        $stmt = null;
        header("location: ../index.php?error=stmtfailed");
        exit();
    }

    if($stmt->rowCount() == 0){
        $stmt = null;
        header("location: ../index.php?error=imageNotFound");
        exit();
    }

    $imageRow = $stmt->fetchAll(PDO::FETCH_ASSOC);
    session_start();
    $_SESSION["IMAGE_SEARCH"] = $imageRow[0]["AVATAR_PIC"];
    $stmt = null;
}
}
?>