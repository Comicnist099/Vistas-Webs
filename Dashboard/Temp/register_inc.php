<?php
include "../classes/imagecontr.classes.php";

include "../classes/registercontr.classes.php";

    if(isset($_POST["submit"])){

        $email = $_POST["email"];
        $pwd1=$_POST["password"];
        $pwd = $_POST["password2"];
        $user = $_POST["username"];
        $alias = $_POST["Alias"];
        

         
        $register = new RegisterContr($user,$alias,$email, $pwd,$pwd1);
        $register->registerUser();



        if( !empty( $_FILES["photo"]["tmp_name"] ) ){

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
            echo 'alert("Se dieron de alta los datos porfavor ve a el apartado de login ");';
            echo '</script>';
            header('location: ../viko.php');

        
        
    }
    else if(isset($_POST["search"])){
        $imageId = $_POST["imageId"];
        ImageContr::withImageId($imageId)->searchImage();
        header("location: ../index.php?error=none");
        exit();
    }


?> 
