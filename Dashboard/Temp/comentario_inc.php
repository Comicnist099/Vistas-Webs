<?php
include "../classes/commentariocontr.classes.php";

if (isset($_POST["send"])) {
    $Comentario=$_POST["Comentario"];
    $news=$_POST["idNews"];

    $ComentarioClass = new Comentariocontr($Comentario,$news,0);
    $ComentarioClass->ComentarioUp();


    echo '<script type="text/javascript">'; 
    echo 'window.location.href = "../Noticias_index.php?id='.$news.'";';
    echo '</script>';


}
?>
