<?php


include "../classes/registercontr.classes.php";

    if(isset($_POST["submit"])){

        $email = $_POST["email"];
        $pwd = $_POST["password2"];
        $user = $_POST["username"];
        $alias = $_POST["Alias"];
    

        if( !empty( $_FILES["photo"]["tmp_name"] ) ){

            $fileName = basename($_FILES["photo"]["tmp_name"]);
            $imageType = strtolower( pathinfo($fileName,PATHINFO_EXTENSION) );
            $allowedTypes = array('png','jpg','gif');
                $imageName = $_FILES["photo"]["tmp_name"];
                $image64 = base64_encode(file_get_contents($imageName));
                $realImage = 'data:image/'.$imageType.';base64,'.$image64;
               
        }
        else{
            header("location: ../viko.php?error=no-file-selected");
            exit();
        }

       
 $register = new RegisterContr($user,$alias,$email, $pwd,$realImage);
                $register->registerUser();
       
        echo '<script type="text/javascript">'; 
        echo 'alert("Registro exitoso <3.");';
        echo '</script>';
        header('location: ../index.php');
    }

?> 
