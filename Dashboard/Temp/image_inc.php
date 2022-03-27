<?php
    include ('../classes/image-contr.classes.php');
  
    if(isset($_POST["submit"])){
        if( !empty( $_FILES["image"]["name"] ) ){

                $fileName = basename($_FILES["photo"]["tmp_name"]);
                $imageType = strtolower( pathinfo($fileName,PATHINFO_EXTENSION) );
                $allowedTypes = array('png','jpg','gif');
                    $imageName = $_FILES["photo"]["tmp_name"];
                    $image64 = base64_encode(file_get_contents($imageName));
                    $realImage = 'data:image/'.$imageType.';base64,'.$image64;
                    ImageContr::withImage($realImage)->uploadImage();
                   
            }
            else{
                header("location: ../viko.php?error=no-file-selected");
                exit();
            }
            
            header("location: ../viko.php?error=none");
            exit();
    }
    else if(isset($_POST["search"])){
        $imageId = $_POST["imageId"];
        ImageContr::withImageId($imageId)->searchImage();
        header("location: ../search.php?error=none");
        exit();
    }

?>