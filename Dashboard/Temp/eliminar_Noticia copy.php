<?php
    include ('../classes/noticias.classes.php');
  
        $idNews=$_GET["idNoticia"];
        
        $eliminar= new NoticiaUpMy();
        $eliminar->NoticiaEliminar($idNews);

        echo '<script type="text/javascript">'; 
        echo 'window.location.href = "../Perfil.php?";';
        echo '</script>';



?>