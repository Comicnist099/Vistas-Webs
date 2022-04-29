<?php

include_once("../classes/modifycontr.classes.php");
include_once("../classes/imagecontr.classes.php");


    if(isset($_POST["submit"])){
        $name = $_POST["Nombre"];
        $Alias = $_POST["Alias"];
        $correo = $_POST["Correo"];
        $pass = $_POST["pass"];
    
        if( !empty( $_FILES["photo"]["tmp_name"] ) ){
            $modify = new Modifycontr($name, $Alias, $correo, $pass);
            $modify->modifyUser();
            
            $fileName = basename($_FILES["photo"]["tmp_name"]);
            $imageType = strtolower( pathinfo($fileName,PATHINFO_EXTENSION) );
            $allowedTypes = array('png','jpg','gif');
                $imageName = $_FILES["photo"]["tmp_name"];
                $image64 = base64_encode(file_get_contents($imageName));
                $realImage = 'data:image/'.$imageType.';base64,'.$image64;
                ImageContr::withImage($realImage,$correo)->uploadImage();
                               
        }
        else{
            header("location: ../viko.php?error=no-file-selected");
            exit();
        }
  

        echo '<script type="text/javascript">'; 
        echo 'alert("Se han modificado los datos.");';
        echo 'window.location.href = "../perfil.php";';
        echo '</script>';
    }
?>