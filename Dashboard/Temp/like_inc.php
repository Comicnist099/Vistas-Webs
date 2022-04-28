<?php
    include ('../classes/like.classes.php');
  
    if(isset($_POST["like"])){

        $news=$_POST["idNews"];


        $login = new LikeNews();
        $login->BuscarLike($news);

       


    }

    include "../classes/noticias.classes.php";
    if(isset($_POST["bajar"])){
        $id_Noticia = $_POST["idNoticia"];
        $Comentario = $_POST["Comentario"];
        
        $seccion = new NoticiaUpMy();
        $seccion->NoticiaBajar( $Comentario,$id_Noticia);
        
        echo '<script type="text/javascript">';
        echo 'window.location.href = "../noticia_revision.php";';
        echo '</script>';
    }

?>