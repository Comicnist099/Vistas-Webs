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

    if ($seccionUno == "VACIO" && $seccionDos == "VACIO" && $seccionTres == "VACIO") {
        echo '<script type="text/javascript">';
        echo 'alert("Es necesario al menos una seccion por noticia");';
        echo 'window.location.href = "../Crear_Noticia.php";';
        echo '</script>';
    } else {
        $News = new Noticiacontr($Titulo, $Contenido, $Palabra, $Firma, $Lugar, $Fecha_Noticia1, $Hora);
        $News->Noticiaup();
        if ($seccionUno !== "VACIO") {
            $NewsSeccion = new NoticiasSeccioncontr($seccionUno);
            $NewsSeccion->NoticiasSeccion();
        }
        if ($seccionDos !== "VACIO") {
            $NewsSeccion2 = new NoticiasSeccioncontr($seccionDos);
            $NewsSeccion2->NoticiasSeccion();
        }
        if ($seccionTres !== "VACIO") {
            $NewsSeccion3 = new NoticiasSeccioncontr($seccionTres);
            $NewsSeccion3->NoticiasSeccion();
        }
    }
    if (!empty($_FILES["uploadedfile1"]["name"])) {
        $fileName = basename($_FILES["uploadedfile1"]["name"]);
        $imageType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedTypes = array('png', 'jpg', 'gif');
        if (in_array($imageType, $allowedTypes)) {
           
                $fileName = basename($_FILES["uploadedfile1"]["tmp_name"]);
                $imageTypeb = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                $imageName = $_FILES["uploadedfile1"]["tmp_name"];
                $image64 = base64_encode(file_get_contents($imageName));
                $realImage = 'data:image/' . $imageTypeb . ';base64,' . $image64;
                NewsImageContr::withImage($realImage, $imageType)->uploadImage();
            
        }
    }
}
?>
