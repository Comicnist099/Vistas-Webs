<?php
    include ('../classes/like.classes.php');
  
    if(isset($_POST["like"])){

        $news=$_POST["idNews"];


        $login = new LikeNews();
        $login->BuscarLike($news);

        echo '<script type="text/javascript">'; 
        echo 'window.location.href = "../NoticiasEntrar_revision.php?id='.$news.'";';
        echo '</script>';


    }



?>