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
      <img src="./img/banner5.png" alt="Italian Trulli" style="align-items: center;">
      <h1>MODIFICAR NOTICIAS</h1>
      <h3>COSAS PRINCIPALES</h3>

      <?php
      $idNoticia = $_GET["idNoticia"];
      $news = " Select * from news where ID_NEWS ='$idNoticia'";
      $NewsSql = $mysqli->query($news);
      while ($row = mysqli_fetch_assoc($NewsSql)) {

      ?>


        <h6>Titulo de la noticia</h6>
        <input value=<?php echo $row['TITLE'] ?> name="Titulo" class="form-control" type="text" placeholder="Noticia con un titulo emocionante"><br>
        <h6>Contenido</h6>

        <div class="Contenido">

          <textarea name="Contenido" class="form-control" placeholder="Colocar contenido de la noticia"><?php echo $row['CONTENIDO'] ?></textarea>
        </div>
        <br>
        <h6>Palabras Claves</h6>


        <input value=<?php echo $row['KEYWORD'] ?> name="Palabra" class="form-control" type="text" placeholder="Fantasico, violin... etc"><br>

        <h6>Firma del Reportero</h6>

        <input value=<?php echo $row['SIGN_REPORTER'] ?> name="Firma" class="form-control" type="text" placeholder="Coloca un alias o como quieres que te reconzcan"><br>

        <h6>Lugar del suceso</h6>

        <input value=<?php echo $row['LOCATION'] ?> name="Lugar" class="form-control" type="text" placeholder="Coloca un alias o como quieres que te reconzcan"><br>



        <div class="form-control">
          <label for="username">Fecha de la noticia</label>
          <p>Fecha anterior: <?php echo $row['NEWS_DATE'] ?> <?php echo $row['HORA'] ?> </p>
          <input name="Fecha_Noticia" type="datetime-local" placeholder="Fecha de la notica" id="date" class="form-control">
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
                while ($row2 = mysqli_fetch_assoc($categorias)) {


                ?>
                  <option value=<?php echo $row2['NOMBRE'] ?>><?php echo $row2['NOMBRE'] ?> </option>
                <?php
                }

                $categorias = null;
                ?>
              </select>




              <button class="btn-add">+</button>
              <button class="btn-add2">Limpiar</button>

              <div class="li-container">
                <ul>
                  <?php

                  $secciones = "select * from tag_car where FK_NEWS ='$idNoticia';";
                  $categorias = $mysqli->query($secciones);
                  $numeroFilas = mysqli_num_rows($categorias);
                  $contador = 1;
                  $primero="VACIO";
                  $segundo="VACIO";
                  $tercero="VACIO";

                  while ($row2 = mysqli_fetch_assoc($categorias)) {

                    if ($contador == 1) {
                      $primero = $row2['nombreSeccion'];
                    }

                    if ($contador == 2) {
                      $segundo = $row2['nombreSeccion'];
                      
                    }

                    if ($contador == 3) {
                      $tercero = $row2['nombreSeccion'];
                      
                    }
                    $contador++;

                  }
                  ?>
                  <li>

                    <input value=<?php echo $primero ?> name="uno" id="uno" readonly>
                  </li>
                  < <li>
                    <input value=<?php echo $segundo ?> name="dos" id="dos" readonly>
                    </li>
                    <li>
                      <input value=<?php echo $tercero ?> name="tres" id="tres" readonly>
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
          $buffer = $_SESSION["Buffer"];

          ?>

          <img class="a" src='<?php echo $buffer; ?>' />

          <button type="submit" name="submit" class="btn btn-dark">Aceptar noticia</button>
        </div>
    </div>
  <?php
      }
  ?>
  </form>

  <script src="js/etiquetas.js"> </script>
  <?php include('./Templates/Footer.php') ?>



</body>

</html>