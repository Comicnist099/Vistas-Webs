<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Crear Noticias</title>


<link rel="stylesheet" href="css/Crear_Noticias.css">

<?php include('./Templates/Nav_Bar.php')?>
<body>
<div class="Forms">
<h1>CREACION DE NOTICIA</h1>
<h3>COSAS PRINCIPALES</h3>

<h6>Titulo de la noticia</h6>
<input class="form-control" type="text" placeholder="Noticia con un titulo emocionante"><br>
<h6>Contenido</h6>

<div class="Contenido">
  
<textarea class="form-control" placeholder="Colocar contenido de la noticia"></textarea> 
</div>



 <h6>Titulo de la noticia</h6>

<br>

<input class="form-control" type="text" placeholder="Default input"><br>
<input class="form-control" type="text" placeholder="Default input"><br>


<h3>CATEGORIAS</h3>
<div class="container">
  <h6 class="page-header">Elige todas las categorias que quieras</h6>
  <div class="row">
    <div class="col-sm-3">
      <select id="Selectores"class="form-control"  >
        <option value="Deportes">Deportes</option>
        <option value="Espectaculos">Espectaculos</option>
        <option value="Monitos">Monitos</option>
      </select>
      <button class="btn-add">+</button>
      <div class="li-container">
            <ul>
         
            </ul>
        </div>
        <div class="empty">
            <p>Ho haz añadido elementos a la lista aún.</p>
        </div>
    </div>
  </div>

  <h3>Añade archivos multimedia</h3>

<input class="form-control" name="uploadedfile" type="file" />
<input class="form-control" name="uploadedfile" type="file" />
<input class="form-control" name="uploadedfile" type="file" />
<input class="form-control" name="uploadedfile" type="file" />
<br>
<br>

</div>
</div>
<script src="js/etiquetas.js"> </script>



</body>
</html>
