<?php
    include ('../classes/like.classes.php');
  
    if(isset($_POST["like"])){

        $news=$_POST["idNews"];


        $login = new LikeNews();
        $login->BuscarLike($news);

       


    }



?>