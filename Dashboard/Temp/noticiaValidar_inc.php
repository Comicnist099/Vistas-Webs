<?php

include "../classes/noticias.classes.php";

    $id_Noticia = $_GET["idNoticia"];
    
    $seccion = new NoticiaUpMy();
    $seccion->NoticiaDown($id_Noticia);
    
    echo '<script type="text/javascript">';
    echo 'window.location.href = "../noticia_revision.php";';
    echo '</script>';

?>

