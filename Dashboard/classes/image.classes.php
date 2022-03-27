<?php
include "../classes/dbh.classes.php";

class Imagen extends Dbh{

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