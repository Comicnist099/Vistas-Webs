<?php

include "../classes/registercontr.classes.php";

    if(isset($_POST["submit"])){
        $email = $_POST["email"];
        $pwd = $_POST["pass1"];
        $user = $_POST["username"];
        $alias = $_POST["Alias"];

        $register = new RegisterContr($user,$alias,$email, $pwd);
        $register->registerUser();
        echo '<script type="text/javascript">'; 
        echo 'alert("Registro exitoso <3.");';
        echo 'window.location.href = "../index.php";'; 
        echo '</script>';
    }

?> 
