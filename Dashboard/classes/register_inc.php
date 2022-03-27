<?php

include "../classes/registercontr.classes.php";

    if(isset($_POST["submit"])){

        $email = $_POST["email"];
        $pwd = $_POST["password2"];
        $user = $_POST["username"];
        $alias = $_POST["Alias"];
        
        if(isset($_FILES['photo']['tmp_name'])){
            $imgData = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
          
        } else {
          
          $imgData="";
 
        }

        $register = new RegisterContr($user,$alias,$email, $pwd,$imgData);

        $register->registerUser();
        echo '<script type="text/javascript">'; 
        echo 'alert("Registro exitoso <3.");';
        echo '</script>';
        header('location: ../index.php');
    }

?> 
