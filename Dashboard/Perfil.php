<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="css/Perfil.css">
<?php include('./Templates/Nav_Bar.php') ?>
<body style="background-image:  url('./img/bg.jpg'); background-repeat: no-repeat;  background-size: cover;
">




<?php 
 
    if(isset($_SESSION["image"])){
        $image = $_SESSION["image"];
        $username= $_SESSION["username"];
        $date=$_SESSION["date"];
        $name=$_SESSION["name"];
        $correo= $_SESSION["user_login"];

?>


<div class="Columnas">

<h1>DATOS PERSONALES</h1><br><br>
<em>Nombre</em><br>
<input type="text" placeholder=<?php echo $name; ?> readonly><br>
<em>Alias</em><br>
<input type="text" placeholder=<?php echo $username; ?> readonly><br>
<em>Correo Electronico</em><br>
<input type="text" placeholder=<?php echo $correo; ?> readonly><br>
<em>Fecha de Creacion</em><br>
<input type="text" placeholder=<?php echo $date; ?> readonly><br>
<div class="profile-pic-div">

        <img class="Perfil"i src='<?php echo $image; ?>'/>

<?php 
    }
?>
 



</div>
<a type="button"id="subir" href="PerfilEditable.php" class="btn btn-primary btn-lg">Modificar Informacion</a>
</div>
</form>

</body>
    

</html>