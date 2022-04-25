<?php
    include ('../classes/comentario.classes.php');
    if(isset($_POST["sendEditar"])){
        $idComentario=$_POST["idComentario"];
        $ContenidoEditado=$_POST["EdicionNuevo"];
        $news=$_POST["id_News"];


        
        $UpdateComentario = new Comentario();
        $UpdateComentario->UpdateComentario($idComentario,$ContenidoEditado);

        echo '<script type="text/javascript">'; 
        echo 'window.location.href = "../NoticiasEntrar_revision.php?id='.$news.'";';
        echo '</script>';
    


    }

?>