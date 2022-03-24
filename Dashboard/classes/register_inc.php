<?php

include "../classes/registercontr.classes.php";

    if(isset($_POST["submit"])){
        $email = $_POST["email"];
        $pwd = $_POST["pass1"];
        

        $register = new RegisterContr($email, $pwd);
        $register->registerUser();
        echo '<script type="text/javascript">'; 
        echo 'alert("Registro exitoso <3.");';
        echo 'window.location.href = "../index.php";'; 
        echo '</script>';
    }

?> 
