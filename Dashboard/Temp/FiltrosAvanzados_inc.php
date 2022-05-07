<?php
include "../classes/noticiascontr.classes.php";
include "../classes/SeccionNewscontr.classes.php";
include "../classes/NewsImagecontr.classes.php";

if (isset($_POST["submit"])) {
    $Clave = $_POST["clave"];
    $Seccion1 = $_POST["Seccion1"];
    $Seccion2 = $_POST["Seccion2"];
    $Seccion3 = $_POST["Seccion3"];
    $Fecha = $_POST["start"];
    $Fecha2 = $_POST["medio"];



    echo '<script type="text/javascript">';
    echo 'window.location.href = "../index_Avanzador.php?FechaUno='.$Fecha2.'&FechaDos='.$Fecha.'&Seccion='.$Seccion1.'&Seccion2='.$Seccion2.'&Seccion3='.$Seccion3.'&Clave='.$Clave.'";';
    echo '</script>';


}
?>
