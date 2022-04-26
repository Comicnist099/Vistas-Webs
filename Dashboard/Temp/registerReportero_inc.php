<?php
include "../classes/imagecontr.classes.php";

include "../classes/registercontr.classes.php";

    if(isset($_POST["submit"])){

        $email = $_POST["email"];
        $pwd1=$_POST["password"];
        $pwd = $_POST["password2"];
        $user = $_POST["username"];
        $alias = $_POST["alias"];
        

        echo '<script type="text/javascript"> alert("'. $user.'");</script>';
        echo '<script type="text/javascript"> alert("'. $email.'");</script>';
        echo '<script type="text/javascript"> alert("'. $pwd1.'");</script>';
        echo '<script type="text/javascript"> alert("'. $pwd.'");</script>';
        echo '<script type="text/javascript"> alert("'. $alias.'");</script>';



        if( !empty( $_FILES["photo"]["tmp_name"] ) ){
            $register = new RegisterContr($user,$alias,$email, $pwd,$pwd1);
            $register->registerReportero();

            $fileName = basename($_FILES["photo"]["tmp_name"]);
            $imageType = strtolower( pathinfo($fileName,PATHINFO_EXTENSION) );
            $allowedTypes = array('png','jpg','gif');
                $imageName = $_FILES["photo"]["tmp_name"];
                $image64 = base64_encode(file_get_contents($imageName));
                $realImage = 'data:image/'.$imageType.';base64,'.$image64;
                ImageContr::withImage($realImage,$email)->uploadImage();
               
        }
        else{
            header("location: ../viko.php?error=no-file-selected");
            exit();
        } 
            echo '<script type="text/javascript">'; 
            echo 'alert("Se dieron de alta los datos del reportero ");';
            echo '</script>';
            header('location: ../registro_reporteros.php');

        
        
    }

?> 
