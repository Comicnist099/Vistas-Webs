<?php

include "../classes/seccion.classes.php";
session_start();
    if(isset($_POST["submit"])){
     
        $idTag=$_GET["idTag"];
     
        $NombreSeccion = $_POST["Nombre"];
        $Color = $_POST["box"];
        $reportero =  $_SESSION["user_id"];
        
        $seccion = new Seccion();
        $seccion->SeccionUpdate($NombreSeccion, $Color, $reportero,$idTag);

        echo "<script> alert('".$idTag."'); </script>";
    
        echo '<script type="text/javascript">';
        echo 'window.location.href = "../secciones2.php";';
        echo '</script>';

        
    }
?>