<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="css/Perfil.css">
<?php include('./Templates/Nav_Bar.php') ?>
<body>

<?php 
 
    if(isset($_SESSION["image"])){
        $image = $_SESSION["image"];
        $username= $_SESSION["username"];
        $date=$_SESSION["date"];
        $name=$_SESSION["name"];
        $correo= $_SESSION["user_login"];
    }

?>
<div class="Columnas">
<form class="form" action="./Temp/modify_inc.php" method="post" enctype="multipart/form-data">

<h1>DATOS PERSONALES</h1><br><br>
<em>Nombre</em><br>
<input name="Nombre"  type="text" value=<?php echo $name; ?> required><br>
<em>Alias</em><br>
<input name="Alias"  type="text" value=<?php echo $username; ?> required ><br>
<em>Correo Electronico</em><br>
<input name="Correo" type="email" value=<?php echo $correo; ?> required ><br>
<em>Contraseña</em><br>
<input name="passs" type="password" value=<?php echo $correo; ?> required><br>
<div class="profile-pic-div">
<img class="Perfil"i src='<?php echo $image; ?>'/>
<input type="file" name="photo" id="file">
<label for="file" id="uploadBtn" >Subir foto</label>

<input type="submit"  name="submit" value="Guardar cambios">
</div>
</form>

</body>
    

</html>