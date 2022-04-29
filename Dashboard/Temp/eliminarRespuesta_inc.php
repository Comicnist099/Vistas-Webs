<?php
    include ('../classes/comentario.classes.php');
  
        $idNews=$_GET["idComentario"];
        $idComentario=$_GET["idNoticia"];
        
        $eliminar= new Comentario();
        $eliminar->eliminarRespuesta($idComentario);
        
        echo '<script type="text/javascript">'; 
    echo 'window.location.href = "../Noticias_index.php?id='.$idNews.'";';
    echo '</script>';
?>