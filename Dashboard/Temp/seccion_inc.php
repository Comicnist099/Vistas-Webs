<?php

include "../classes/seccioncontr.classes.php";

if (isset($_POST["anadir"])) {
    session_start();
    $name = $_POST["name"];
    $color = $_POST["box"];
    $reportero =  $_SESSION["user_id"];

    $seccion = new Sessioncontr($name, $color, $reportero,null);
    $seccion->registerUser();
    
    echo '<script type="text/javascript">';
    echo 'window.location.href = "../secciones2.php";';
    echo '</script>';


}

