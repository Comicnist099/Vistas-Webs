<?php
include('../classes/modify.class.php');

session_start();
$id2 = $_SESSION["user_id"];
echo '<script type="text/javascript">'; 
echo 'alert("'.$id2.'");';
echo '</script>';
$eliminar2 = new Modify();
$eliminar2->eliminarUsuario($id2);

echo '<script type="text/javascript">';
echo 'window.location.href = "../index.php";';
echo '</script>';
?>