<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="css/Perfil.css">
<?php include('./Templates/Nav_Bar.php') ?>
<body>


<div class="Columnas">

<h1>DATOS PERSONALES</h1><br><br>
<em>Nombre</em><br>
<input type="text" placeholder="Nombre" ><br>
<em>Alias</em><br>
<input type="text" placeholder="Alias" ><br>
<em>Correo Electronico</em><br>
<input type="text" placeholder="Correo Electronico" ><br>
<em>Nacimiento</em><br>
<input type="text" placeholder="Nacimiento" ><br>
<em>Fecha de Creacion</em><br>
<input type="text" placeholder="Fecha de Creacion" ><br>
<div class="profile-pic-div">
<img class="Perfil"src="img/avatar.png" id="Moni">
<input type="file" name="photo" id="file">
<label for="file" id="uploadBtn" >Subir foto</label>

<a type="button" href="Perfil.php" class="btn btn-primary btn-lg">Aceptar</a>
</div>


</body>
    

</html>