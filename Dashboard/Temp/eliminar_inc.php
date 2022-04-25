<?php
    include ('../classes/comentario.classes.php');
  
        $idNews=$_GET["idComentario"];
        $idComentario=$_GET["idNoticia"];
        
        $eliminar= new Comentario();
        $eliminar->eliminar($idComentario);

        echo '<script type="text/javascript">'; 
        echo 'window.location.href = "../NoticiasEntrar_revision.php?id='.$idNews.'";';
        echo '</script>';



?>