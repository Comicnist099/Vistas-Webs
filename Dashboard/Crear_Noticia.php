<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Crear Noticias</title>


<script>
        function mialerta() {  
            alert("Se ha creado la noticia");
        } 
    </script>

<link rel="stylesheet" href="css/Crear_Noticias.css">

<?php include('./Templates/Nav_Bar.php')?>
<body style="background-image:  url('./img/bg.jpg'); background-repeat: no-repeat;  background-size: cover;
">
<div class="Forms">
<img src="./img/banner.png" alt="Italian Trulli" style="align-items: center;">
<h1>CREACION DE NOTICIA</h1>
<h3>COSAS PRINCIPALES</h3>

<h6>Titulo de la noticia</h6>
<input class="form-control" type="text" placeholder="Noticia con un titulo emocionante"><br>
<h6>Contenido</h6>

<div class="Contenido">
  
<textarea class="form-control" placeholder="Colocar contenido de la noticia"></textarea> 
</div>
<br>



 <h6>Palabras Claves</h6>


<input class="form-control" type="text" placeholder="Fantasico, violin... etc"><br>

<h6>Firma del Reportero</h6>

<input class="form-control" type="text" placeholder="Coloca un alias o como quieres que te reconzcan"><br>

<div class="form-control">
      <label for="username">Fecha de la noticia</label>
        <input type="date" placeholder="Fecha de la notica" id="date" size="50" class="form-control" min="1910-01-01" max="2020-01-01">
    <i class="fas fa-check-circle"></i>
      <i class="fas fa-exclamation-circle"></i>
                           
  </div>

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
            <p>No haz añadido elementos a la lista aún.</p>
        </div>
    </div>
  </div>

  <h3>AÑADE FOTOS O VIDEOS</h3>

<input class="form-control" name="uploadedfile" type="file" />
<input class="form-control" name="uploadedfile" type="file" />
<input class="form-control" name="uploadedfile" type="file" />
<input class="form-control" name="uploadedfile" type="file" />
<br>
<br>

<button href="index.php"  onclick="mialerta();"   type="button" class="btn btn-dark">Aceptar noticia</button>
</div>
</div>

<script src="js/etiquetas.js"> </script>
<?php include('./Templates/Footer.php')?>



</body>
</html>
