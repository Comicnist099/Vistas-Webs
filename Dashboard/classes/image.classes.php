<?php
include "../classes/dbh.classes.php";

class Imagen extends Dbh{

protected function upload($image,$correo){
    $stmt = $this->connect()->prepare('CALL PROC_USER(?, ?, ?, ?, ?, ?, ?, ?)');
    if(!$stmt->execute(array('UpdateFoto',null,null,$correo,null, $image, null, null))){
        $stmt = null;
        header("location: ../index.php?error=stmtfailed");
        exit();
    }
    $stmt = null;
}

protected function search($imageId){
    $stmt = $this->connect()->prepare('SELECT Avatar_PIC FROM user WHERE CORREO=?;');
    if(!$stmt->execute(array($imageId))){
        $stmt = null;
        header("location: ../search.php?error=stmtfailed");
        exit();
    }

    if($stmt->rowCount() == 0){
        $stmt = null;
        header("location: ../search.php?error=imageNotFound");
        exit();
    }

    $imageRow = $stmt->fetchAll(PDO::FETCH_ASSOC);
    session_start();
    $_SESSION["IMAGE_SEARCH"] = $imageRow[0]["Avatar_PIC"];
    $stmt = null;
}

}
?>