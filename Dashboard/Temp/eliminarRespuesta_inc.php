<?php
    include ('../classes/comentario.classes.php');
  
        $idNews=$_GET["idComentario"];
        $idComentario=$_GET["idNoticia"];
        
        $eliminar= new Comentario();
        $eliminar->eliminarRespuesta($idComentario);

?>