<?php
include "../classes/noticiascontr.classes.php";
include "../classes/SeccionNewscontr.classes.php";
include "../classes/NewsImagecontr.classes.php";

if (isset($_POST["submit"])) {
    session_start();
    $idNoticia = $_POST["idNoticia"];
    $seccionUno = $_POST["uno"];
    $seccionDos = $_POST["dos"];
    $seccionTres = $_POST["tres"];
    $Titulo = $_POST["Titulo"];
    $Contenido = $_POST["Contenido"];
    $Palabra = $_POST["Palabra"];
    $Firma = $_POST["Firma"];
    $Lugar = $_POST["Lugar"];
    $Fecha_Noticia = $_POST["Fecha_Noticia"];



    $Extension = $_POST["Extension"];
    $Extension2 = $_POST["Extension2"];

    if (!empty($_POST["Extension3"])) {
        $Extension3 = $_POST["Extension3"];
    }

    if (!empty($_POST["Extension4"])) {

        $Extension4 = $_POST["Extension4"];
    }


    $id = $_POST["id"];
    $id2 = $_POST["id2"];
    if (!empty($_POST["id3"])) {

        $id3 = $_POST["id3"];
    }

    if (!empty($_POST["id3"])) {

        $id4 = $_POST["id4"];
    }






    $Fecha_Noticia1 = substr($Fecha_Noticia, 0, 10);
    $Hora = substr($Fecha_Noticia, -5);

    if (!empty($_FILES["uploadedfile1"]["name"])) {
        $fileName = basename($_FILES["uploadedfile1"]["name"]);
        $imageType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    } else {
        $imageType = strval($Extension);
    }
    if (!empty($_FILES["uploadedfile2"]["name"])) {
        $fileNameA = basename($_FILES["uploadedfile2"]["name"]);
        $imageTypeA = strtolower(pathinfo($fileNameA, PATHINFO_EXTENSION));
    } else {
        $imageTypeA = strval($Extension2);
    }
    if (!empty($_FILES["uploadedfile3"]["name"])) {
        $fileNameB = basename($_FILES["uploadedfile3"]["name"]);
        $imageTypeB = strtolower(pathinfo($fileNameB, PATHINFO_EXTENSION));
    } else {
        if (!empty($_POST["Extension3"])) {
            $imageTypeB =  strval($Extension3);
        }
    }
    if (!empty($_FILES["uploadedfile4"]["name"])) {
        $fileNameC = basename($_FILES["uploadedfile4"]["name"]);
        $imageTypeC = strtolower(pathinfo($fileNameC, PATHINFO_EXTENSION));
    } else {
        if (!empty($_POST["Extension4"])) {
            $imageTypeC = strval($Extension4);
        }
    }

    $allowedTypes = array("png", "jpg");
    $allowedTypes2 = array('png', 'jpg', 'gif', 'mp4');
    $mp4 = "mp4";




    if (trim($imageTypeA) == "mp4" ||  trim($imageTypeB) == "mp4"  ||  trim($imageTypeC) == "mp4") {

        if (strcmp($imageType, "png") || strcmp($imageType, "jpg")) {


            if ($seccionUno == "VACIO" && $seccionDos == "VACIO" && $seccionTres == "VACIO") {
                echo '<script type="text/javascript">';
                echo 'alert("Es necesario al menos una seccion por noticia");';
                echo 'window.location.href = "../Crear_Noticia.php";';
                echo '</script>';
            } else {




                $NewsSeccion4 = new NoticiasSeccioncontr($seccionUno, $idNoticia);
                $NewsSeccion4->EliminarSeccion();

                if ($seccionUno !== "VACIO") {
                    $NewsSeccion = new NoticiasSeccioncontr($seccionUno, $idNoticia);
                    $NewsSeccion->NoticiasSeccionContr();
                }
                if ($seccionDos !== "VACIO") {
                    $NewsSeccion2 = new NoticiasSeccioncontr($seccionDos, $idNoticia);
                    $NewsSeccion2->NoticiasSeccionContr();
                }
                if ($seccionTres !== "VACIO") {
                    $NewsSeccion3 = new NoticiasSeccioncontr($seccionTres, $idNoticia);
                    $NewsSeccion3->NoticiasSeccionContr();
                }
            }

            if (!empty($_FILES["uploadedfile1"]["name"])) {


                if (in_array($imageType, $allowedTypes)) {
                    $fileName = basename($_FILES["uploadedfile1"]["tmp_name"]);
                    $imageTypez = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                    $imageName = $_FILES["uploadedfile1"]["tmp_name"];
                    $image64 = base64_encode(file_get_contents($imageName));
                    $realImage = 'data:image/' . $imageTypez . ';base64,' . $image64;
                    NewsImageContr::UpdateImage($realImage, $imageType, $idNoticia, $id)->UpdateImageSql();
                } else {
                    echo "<script> alert('Solo permite formato png,jpg y gif'); </script>";
                }
            }

            if (!empty($_FILES["uploadedfile2"]["name"])) {
                if (in_array($imageTypeA, $allowedTypes2)) {
                    $fileName = basename($_FILES["uploadedfile2"]["tmp_name"]);
                    $imageTypey = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                    $imageName = $_FILES["uploadedfile2"]["tmp_name"];
                    $image64 = base64_encode(file_get_contents($imageName));
                    $realImage = 'data:image/' . $imageTypey . ';base64,' . $image64;
                    echo "<script> alert('hola2'); </script>";
                    NewsImageContr::UpdateImage($realImage, $imageTypeA, $idNoticia, $id2)->UpdateImageSql();
                } else {
                    echo "<script> alert('Solo permite formato png,jpg, gif o mp4'); </script>";
                }
            }
            if (!empty($_FILES["uploadedfile3"]["name"])) {
                if (in_array($imageTypeB, $allowedTypes2)) {
                    $fileName = basename($_FILES["uploadedfile3"]["tmp_name"]);
                    $imageTypex = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                    $imageName = $_FILES["uploadedfile3"]["tmp_name"];
                    $image64 = base64_encode(file_get_contents($imageName));
                    $realImage = 'data:image/' . $imageTypex . ';base64,' . $image64;
                    NewsImageContr::UpdateImage($realImage, $imageTypeB, $idNoticia, $id3)->UpdateImageSql();
                } else {
                    echo "<script> alert('Solo permite formato png,jpg, gif o mp4'); </script>";
                }
            }
            if (!empty($_FILES["uploadedfile4"]["name"])) {
                if (in_array($imageTypeC, $allowedTypes2)) {
                    $fileName = basename($_FILES["uploadedfile4"]["tmp_name"]);
                    $imageTypew = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                    $imageName = $_FILES["uploadedfile4"]["tmp_name"];
                    $image64 = base64_encode(file_get_contents($imageName));
                    $realImage = 'data:image/' . $imageTypew . ';base64,' . $image64;
                    NewsImageContr::UpdateImage($realImage, $imageTypeC, $idNoticia, $id4)->UpdateImageSql();
                } else {
                    echo "<script> alert('Solo permite formato png,jpg o mp4'); </script>";
                }
            }
            $News = new Noticiacontr($Titulo, $Contenido, $Palabra, $Firma, $Lugar, $Fecha_Noticia1, $Hora, $idNoticia);

            $News->NoticiaMejora();
        } else {
            echo "<script> alert('Es necesario que la portada siga el formato de png, jpg); </script>";
        }
    } else {
        echo "<script> alert('Cada noticia necesita minimo un video'); </script>";
    }
    echo '<script type="text/javascript">';
    echo 'window.location.href = "../index.php";';
    echo '</script>';
}
