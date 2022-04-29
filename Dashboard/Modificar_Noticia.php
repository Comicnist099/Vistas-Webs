<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Modificar Noticia</title>


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

<h7>COMENTARIO</h7>
<p><?php echo $row['Comentario'] ?></p><br><br>
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
          <input name="Fecha_Noticia" type="datetime-local"  value="<?php echo $row['NEWS_DATE'] ?>T<?php echo $row['HORA'] ?>" placeholder="Fecha de la notica" id="date" class="form-control">
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
                  $primero = "VACIO";
                  $segundo = "VACIO";
                  $tercero = "VACIO";

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
                    <button class="btn-add3 bx bxs-trash"></button>
                  </li>
                  < <li>
                    <input value=<?php echo $segundo ?> name="dos" id="dos" readonly>
                    <button class="btn-add4 bx bxs-trash"></button>

                    </li>
                    <li>
                      <input value=<?php echo $tercero ?> name="tres" id="tres" readonly>
                      <button class="btn-add5 bx bxs-trash"></button>

                    </li>
                </ul>
              </div>
            </div>
          </div>

          <h3>AÑADE FOTOS O VIDEOS</h3>
          <p>PORTADA DE LA NOTICIA</p>

          <?php
          $Multimedia = "select * from gallery_news where FK_NEWS='$idNoticia';";
          $MultimediaSql = $mysqli->query($Multimedia);
          $contador = 0;
          while ($row3 = mysqli_fetch_assoc($MultimediaSql)) {

            if ($contador == 0) {

          ?>

              <img class="Miniatura" src="<?php echo $row3['MULTIMEDIA'] ?> " />


              <input class="form-control" name="uploadedfile1" type="file" />
          <?php
            }
            $contador++;
          }
          ?>

          <p>MINIMO UN VIDEO y fotos</p>
          <?php
          $Multimedia2 = "select * from gallery_news where FK_NEWS='$idNoticia';";
          $MultimediaSql2 = $mysqli->query($Multimedia2);
          $contador = 1;
          $numrows = mysqli_num_rows($MultimediaSql2);

          while ($row4 = mysqli_fetch_assoc($MultimediaSql2)) {

            if ($contador >= 2) {
              $allowedTypes = array('png', 'jpg', 'gif');
              $allowedTypes2 = array('png', 'jpg', 'gif', 'mp4');
              if (in_array($row4['EXTENSION'], $allowedTypes)) {
          ?>
                <img class="Miniatura" src="<?php echo $row4['MULTIMEDIA'] ?> " />
                <input class="form-control" name="uploadedfile<?php echo $contador ?> " type="file" />

              <?php
              } else {
              ?>
                <video style=" margin: auto;" class="Miniatura" controls>
                  <source src="<?php echo $row4['MULTIMEDIA'] ?> " type="video/mp4">
                  Your browser does not support HTML video.
                </video>
                <input class="form-control" name="uploadedfile<?php echo $contador ?> " type="file" />

            <?php
              }
            }
            $contador++;
          }
          if ($numrows == 2) {
            ?>
            <input class="form-control" name="uploadedfile3" type="file" />
            <input class="form-control" name="uploadedfile4" type="file" />
          <?php
          }
          if ($numrows == 3) {
          ?>
            <input class="form-control" name="uploadedfile4" type="file" />

        <?php
          }
        }
        ?>

        <br>
        <br>

        <button type="submit" name="submit" class="btn btn-dark">Aceptar noticia</button>
        </div>
    </div>

  </form>

  <script src="js/etiquetas.js"> </script>
  <?php include('./Templates/Footer.php') ?>



</body>

</html>