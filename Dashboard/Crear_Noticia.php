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

  <?php
  require 'conection.php';
  include('./Templates/Nav_Bar.php') ?>

<body style="background-image:  url('./img/bg.jpg'); background-repeat: no-repeat;  background-size: cover;
">
  <form class="form" action="./Temp/noticia_inc.php" method="post" enctype="multipart/form-data">
    <div class="Forms">
      <img src="./img/banner.png" alt="Italian Trulli" style="align-items: center;">
      <h1>CREACION DE NOTICIA</h1>
      <h3>COSAS PRINCIPALES</h3>

      <h6>Titulo de la noticia</h6>
      <input name="Titulo" class="form-control" type="text" placeholder="Noticia con un titulo emocionante"><br>
      <h6>Contenido</h6>

      <div class="Contenido">

        <textarea name="Contenido" class="form-control" placeholder="Colocar contenido de la noticia"></textarea>
      </div>
      <br>
      <h6>Palabras Claves</h6>


      <input name="Palabra" class="form-control" type="text" placeholder="Fantasico, violin... etc"><br>

      <h6>Firma del Reportero</h6>

      <input name="Firma" class="form-control" type="text" placeholder="Coloca un alias o como quieres que te reconzcan"><br>

      <h6>Lugar del suceso</h6>

    <input name="Lugar" class="form-control" type="text" placeholder="Coloca un alias o como quieres que te reconzcan"><br>



      <div class="form-control">
        <label for="username">Fecha de la noticia</label>
        <input name="Fecha_Noticia" type="datetime-local" placeholder="Fecha de la notica" id="date" class="form-control" >
        <i class="fas fa-check-circle"></i>
        <i class="fas fa-exclamation-circle"></i>

      </div>

      <h3>CATEGORIAS</h3>
      <div class="container">
        <h6 class="page-header">Elige todas las categorias que quieras</h6>
        <div class="row">
          <div class="col-sm-3">
            <select id="Selectores" class="form-control">
              <?php
              $secciones = "select * from V_tag;";
              $categorias = $mysqli->query($secciones);
              $arraysecciones = array();
              while ($row = mysqli_fetch_assoc($categorias)) {


              ?>
                <option value=<?php echo $row['NOMBRE'] ?>><?php echo $row['NOMBRE'] ?> </option>
              <?php
              }

              $categorias = null;
              ?>
            </select>




            <button class="btn-add">+</button>
            <button class="btn-add2">Limpiar</button>

            <div class="li-container">
              <ul>
                <li>
                  <input value="VACIO" name="uno" id="uno" readonly>
                  <button class="btn-add3 bx bxs-trash"></button>
                </li>
                <li>
                  <input value="VACIO" name="dos" id="dos" readonly>
                  <button class="btn-add4 bx bxs-trash"></button>
                </li>
                <li>
                  <input value="VACIO" name="tres"id="tres" readonly>
                  <button class="btn-add5 bx bxs-trash"></button>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <h3>AÑADE FOTOS O VIDEOS</h3>
        <p>PORTADA DE LA NOTICIA</p>
        <input class="form-control" name="uploadedfile1" type="file" />
        
        <p>MINIMO UN VIDEO y fotos</p>
        <input class="form-control" name="uploadedfile2" type="file" />
        <input class="form-control" name="uploadedfile3" type="file" />
        <input class="form-control" name="uploadedfile4" type="file" />
        <br>
        <br>
        <?php
            $buffer=$_SESSION["Buffer"];
        
        ?>  
      
        <img  class="a" src='<?php echo $buffer; ?>'/>

        <button type="submit" name="submit" class="btn btn-dark">Aceptar noticia</button>
      </div>
    </div>
  </form>

  <script src="js/etiquetas.js"> </script>
  <?php include('./Templates/Footer.php') ?>



</body>

</html>