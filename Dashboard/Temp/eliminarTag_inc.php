<?php
    include ('../classes/seccion.classes.php');
  
        $idTag=$_GET["idTag"];
        $eliminar= new Seccion();
        $eliminar->eliminar($idTag);

        echo '<script type="text/javascript">'; 
        echo 'window.location.href = "../secciones2.php";';
        echo '</script>';



?>