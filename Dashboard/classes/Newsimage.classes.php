<?php
include_once("../classes/dbh.classes.php");

class  NewsImage extends Dbh{

protected function upload($image,$extension){
    $stmt = $this->connect()->prepare('CALL PROC_NEWSFOTOS(?, ?, ?)');
    if(!$stmt->execute(array('Insertar',$image,$extension))){
        $stmt = null;
        header("location: ../index.php?error=stmtfailed");
        exit();
    }
    $_SESSION["Buffer"] = $image;

    $stmt = null;
}

protected function search($imageId){
    $stmt = $this->connect()->prepare('SELECT Avatar_PIC FROM user WHERE CORREO=?;');
    if(!$stmt->execute(array($imageId))){
        $stmt = null;
        header("location: ../viko.php?error=stmtfailed");
        exit();
    }

    if($stmt->rowCount() == 0){
        $stmt = null;
        header("location: ../viko.php?error=imageNotFound");
        exit();
    }

    $imageRow = $stmt->fetchAll(PDO::FETCH_ASSOC);
    session_start();
    $_SESSION["IMAGE_SEARCH"] = $imageRow[0]["Avatar_PIC"];
    $stmt = null;
}

}
?>