<?php
include "../classes/noticiascontr.classes.php";

if (isset($_POST["submit"])) {
    session_start();
    $Titulo = $_POST["Titulo"];
    $Contenido = $_POST["Contenido"];
    $Palabra = $_POST["Palabra"];
    $Firma = $_POST["Firma"];
    $Lugar = $_POST["Lugar"];
    $Fecha_Noticia = $_POST["Fecha_Noticia"];


    $Fecha_Noticia1=substr($Fecha_Noticia,0,10);
    $Hora=substr($Fecha_Noticia,-5);



    $News = new Noticiacontr($Titulo,$Contenido,$Palabra,$Firma,$Lugar,$Fecha_Noticia1,$Hora);
    $News->Noticiaup();

    echo '<script type="text/javascript">';
    echo 'alert("La ' .  $Fecha_Noticia1 . 'ha ");';
    echo '</script>';
}
?>
