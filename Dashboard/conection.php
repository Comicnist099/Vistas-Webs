<?php

    $mysqli = new mysqli('localhost', 'root', '', 'bdm');

    if($mysqli->connect_error){
        die('Error en la conexion' . $mysqli->connect_error);
    }
    
?> 