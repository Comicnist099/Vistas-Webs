<?php
include "../classes/noticiascontr.classes.php";
include "../classes/SeccionNewscontr.classes.php";
include "../classes/NewsImagecontr.classes.php";

if (isset($_POST["submit"])) {
    session_start();
    $seccionUno = $_POST["uno"];
    $seccionDos = $_POST["dos"];
    $seccionTres = $_POST["tres"];
    $Titulo = $_POST["Titulo"];
    $Contenido = $_POST["Contenido"];
    $Palabra = $_POST["Palabra"];
    $Firma = $_POST["Firma"];
    $Lugar = $_POST["Lugar"];
    $Fecha_Noticia = $_POST["Fecha_Noticia"];


    $Fecha_Noticia1 = substr($Fecha_Noticia, 0, 10);
    $Hora = substr($Fecha_Noticia, -5);


    if (!empty($_FILES["uploadedfile1"]["name"])) {
        $fileName = basename($_FILES["uploadedfile1"]["name"]);
        $imageType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        $fileNameA = basename($_FILES["uploadedfile2"]["name"]);
        $imageTypeA = strtolower(pathinfo($fileNameA, PATHINFO_EXTENSION));

        $fileNameB = basename($_FILES["uploadedfile3"]["name"]);
        $imageTypeB = strtolower(pathinfo($fileNameB, PATHINFO_EXTENSION));

        $fileNameC = basename($_FILES["uploadedfile4"]["name"]);
        $imageTypeC = strtolower(pathinfo($fileNameC, PATHINFO_EXTENSION));



        $allowedTypes = array('png', 'jpg', 'gif');
        $allowedTypes2 = array('png', 'jpg', 'gif', 'mp4');

        if ($imageTypeA == 'mp4' || $imageTypeB == 'mp4' || $imageTypeC == 'mp4') {
            if (in_array($imageType, $allowedTypes)) {
                if ($seccionUno == "VACIO" && $seccionDos == "VACIO" && $seccionTres == "VACIO") {
                    echo '<script type="text/javascript">';
                    echo 'alert("Es necesario al menos una seccion por noticia");';
                    echo 'window.location.href = "../Crear_Noticia.php";';
                    echo '</script>';
                } else {
                    $News = new Noticiacontr($Titulo, $Contenido, $Palabra, $Firma, $Lugar, $Fecha_Noticia1, $Hora,null);
                    $News->Noticiaup();
                    if ($seccionUno !== "VACIO") {
                        $NewsSeccion = new NoticiasSeccioncontr($seccionUno,null);
                        $NewsSeccion->NoticiasSeccion();
                    }
                    if ($seccionDos !== "VACIO") {
                        $NewsSeccion2 = new NoticiasSeccioncontr($seccionDos,null);
                        $NewsSeccion2->NoticiasSeccion();
                    }
                    if ($seccionTres !== "VACIO") {
                        $NewsSeccion3 = new NoticiasSeccioncontr($seccionTres,null);
                        $NewsSeccion3->NoticiasSeccion();
                    }
                }

                if (in_array($imageType, $allowedTypes)) {
                    $fileName = basename($_FILES["uploadedfile1"]["tmp_name"]);
                    $imageTypez = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                    $imageName = $_FILES["uploadedfile1"]["tmp_name"];
                    $image64 = base64_encode(file_get_contents($imageName));
                    $realImage = 'data:image/' . $imageTypez . ';base64,' . $image64;
                    NewsImageContr::withImage($realImage, $imageType)->uploadImage();
                } else {
                    echo "<script> alert('Solo permite formato png,jpg y gif'); </script>";
                }

                if (!empty($_FILES["uploadedfile2"]["name"])) {
                    if (in_array($imageTypeA, $allowedTypes2)) {
                        $fileName = basename($_FILES["uploadedfile2"]["tmp_name"]);
                        $imageTypey = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                        $imageName = $_FILES["uploadedfile2"]["tmp_name"];
                        $image64 = base64_encode(file_get_contents($imageName));
                        $realImage = 'data:image/' . $imageTypey . ';base64,' . $image64;
                        NewsImageContr::withImage($realImage, $imageTypeA)->uploadImage();
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
                        NewsImageContr::withImage($realImage, $imageTypeB)->uploadImage();
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
                        NewsImageContr::withImage($realImage, $imageTypeC)->uploadImage();
                    } else {
                        echo "<script> alert('Solo permite formato png,jpg,gif o mp4'); </script>";
                    }
                }
            } else {
                echo "<script> alert('Es necesario que la portada siga el formato de png, jpg o gif'); </script>";
            }
        } else {
            echo "<script> alert('Cada noticia necesita minimo un video'); </script>";
        }
    }
    echo '<script type="text/javascript">'; 
    echo 'window.location.href = "../noticia_revision.php";';
    echo '</script>';
}
?>
