<?php

include "../classes/noticias.classes.php";
if(isset($_POST["bajar"])){
    $id_Noticia = $_POST["idNoticia"];
    $Comentario = $_POST["Comentario"];
    
    $seccion = new NoticiaUpMy();
    $seccion->NoticiaBajar( $Comentario,$id_Noticia);
    
    echo '<script type="text/javascript">';
    echo 'window.location.href = "../noticia_revision.php";';
    echo '</script>';
}



?>
