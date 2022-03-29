<?php

include "../classes/logincontr.classes.php";

    if(isset($_POST["submit"])){
        $email = $_POST["Correo"];
        $pwd = $_POST["pass"];

        $login = new LoginContr($email, $pwd);
        $login->loginUser();

        
        echo '<script type="text/javascript">'; 
        echo 'alert("Inicio de sesion exitoso <3.");';
        echo 'window.location.href = "../index.php";';
        echo '</script>';
    }
?>