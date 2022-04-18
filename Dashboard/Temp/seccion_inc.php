<?php

include "../classes/seccioncontr.classes.php";

    if(isset($_POST["submit"])){
        session_start();
        $name = $_POST["name"];
        $color=$_POST["box"];
        $reportero=  $_SESSION["user_id"];
 
      
        $seccion = new Sessioncontr($name,$color,$reportero);
        $seccion->registerUser();
      

            echo '<script type="text/javascript">'; 
            echo 'alert("'.$reportero.'");';
            echo '</script>';

        
        
    }
    if(isset($_POST["Eliminar"])){
        session_start();
        $name = $_POST["name"];
        $color=$_POST["box"];
        $reportero=  $_SESSION["user_id"];
 
        $seccion = new Sessioncontr($name,$color,$reportero);
        $seccion->EliminarSeccion();
        
        
    }
    


?> 
