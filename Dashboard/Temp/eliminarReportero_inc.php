<?php
    include ('../classes/register.classes.php');
  
        $idUsuario=$_GET["idUsuario"];
        
        $eliminar= new Register();
        $eliminar->RepoteroEliminar($idUsuario);

        echo '<script type="text/javascript">'; 
        echo 'window.location.href = "../registro_reporteros.php";';
        echo '</script>';



?>