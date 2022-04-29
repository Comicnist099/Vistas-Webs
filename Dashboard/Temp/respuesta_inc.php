<?php
include "../classes/commentariocontr.classes.php";

if (isset($_POST["send"])) {
    $idComentario=$_POST["id_Comentario"];
    $idnews=$_POST["idNews"];
    $Comentario=$_POST["Comentario"];
    

    $ComentarioClass = new Comentariocontr($Comentario,$idnews,$idComentario);
    $ComentarioClass->ComentarioUp();

    echo '<script type="text/javascript">'; 
    echo 'window.location.href = "../Noticias_index.php?id='.$idnews.'";';
    echo '</script>';

}
?>
