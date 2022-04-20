<?php
include "../classes/seccioncontr.classes.php";

if (isset($_POST["submit"])) {
    $Titulo = $_POST["Titulo"];
    $Contenido = $_POST["Contenido"];
    $Palabra = $_POST["Palabra"];
    $Firma = $_POST["Firma"];
    $Lugar = $_POST["Lugar"];
    $Fecha_Noticia = $_POST["Fecha_Noticia"];
 
    echo '<script type="text/javascript">';
    echo 'alert("La ' . $Fecha_Noticia . 'ha ");';
    echo '</script>';
}
?>
