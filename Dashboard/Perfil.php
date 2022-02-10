<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="css/Perfil.css">
<?php include('./Templates/Nav_Bar.php') ?>
<body>
<img  class="Perfil" src="img/perrito.jfif">


<button id="Cambiar-foto" type="button" class="btn btn-primary btn-lg">Cambiar Foto</button>


<div class="Columnas">

<h1>DATOS PERSONALES</h1><br><br>
<em>Nombre</em><br>
<input type="text" placeholder="Nombre" readonly><br>
<em>Alias</em><br>
<input type="text" placeholder="Alias" readonly><br>
<em>Correo Electronico</em><br>
<input type="text" placeholder="Correo Electronico" readonly><br>
<em>Telefono</em><br>
<input type="text" placeholder="Telefono" readonly><br>
<em>Nacimiento</em><br>
<input type="text" placeholder="Nacimiento" readonly><br>
<em>Fecha de Creacion</em><br>
<input type="text" placeholder="Fecha de Creacion" readonly><br>

<a type="button" href="PerfilEditable.php" class="btn btn-primary btn-lg">Modificar Informacion</a>
</div>


</body>
    

</html>