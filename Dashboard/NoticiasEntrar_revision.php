<!DOCTYPE html>
<html lang="en">
<title>Noticia</title>

<link rel="stylesheet" href="css/NoticiasEntrar.css">
<?php
require 'conection.php';
include('./Templates/Nav_bar.php') ?>
<!-- Compiled and minified Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- Minified JS library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<body>
  <section class="Reciente">
    <h3>PODRIA INTERESARTE</h3><br><br><br>
    <div class=ConjuntoNoticias>
      <span Class="Noticia1">SANTAS CACHUCHAS LO AGARRON CON EL TINNER Y RATA EN MANO</span>
      <span Class="Noticia2">SANTAS CACHUCHAS LO AGARRON CON EL TINNER Y RATA EN MANO</span>
      <span Class="Noticia3">SANTAS CACHUCHAS LO AGARRON CON EL TINNER Y RATA EN MANO</span>
    </div>

  </section>
  <form class="form" action="./Temp/like_inc.php" method="post" enctype="multipart/form-data">
    <section class="Publicaciones2">
      <?php
      $idNoticia = $_GET["id"];
      $news = " Select * from news where ID_NEWS ='$idNoticia'";
      $NewsSql = $mysqli->query($news);
      while ($row = mysqli_fetch_assoc($NewsSql)) {



      ?>
        <div class="Casilla">
          <div class=CasillaFecha>
            <a style="font-weight:900">Fecha y Hora de Publicacion: </a><a><?php echo $row['DATE_PUBLICACION'] ?></a> <br>
            <a style="font-weight:900">Fecha y Hora de la noticia </a><a><?php echo $row['NEWS_DATE'] ?></a> <br>
            <a style="font-weight:900">Localización: </a><a><?php echo $row['LOCATION'] ?></a>
            <a style="font-weight:900">PALABRAS CLAVES: </a><?php echo $row['KEYWORD'] ?><a>
          </div>
          <div class="large-4">
            <span>Deportes</span>
            <span>Deportes</span>
            <span>Deportes</span>
          </div>
          <div class="CasillaTitulo">
            <span style=" font-weight:900"> <?php echo $row['TITLE'] ?></span><br>

          </div>
          <div class="large-3" style="font-weight:400">
            <p><?php echo $row['CONTENIDO'] ?></p>

          </div>

          <br><br><br>
          <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
              <?php
              $NewsMultimedia =  "Select *from v_News_multimedia where idNoticia='$idNoticia'";
              $NewsMultimediaSql = $mysqli->query($NewsMultimedia);
              $contador = 0;
              while ($row2 = mysqli_fetch_assoc($NewsMultimediaSql)) {
                if ($contador == 0) {
                  $contador++;
              ?>
                  <div class="item active">
                    <img style="display:block; margin:auto;   height: 600px; " src="<?php echo $row2['Multimedia'] ?>" alt="">
                  </div>
                  <?php
                } else {
                  $allowedTypes = array('png', 'jpg', 'gif');
                  $allowedTypes2 = array('png', 'jpg', 'gif', 'mp4');
                  if (in_array($row2['EXTENSION'], $allowedTypes)) {
                  ?>
                    <div class="item">
                      <img style="display:block; margin:auto; height: 600px;" src="<?php echo $row2['Multimedia'] ?>" alt="">
                    </div>
                  <?php
                  } else {
                  ?><div class="item">
                      <video style="display:block; margin:auto; height: 600px;" controls>
                        <source src="<?php echo $row2['Multimedia'] ?>" type="video/mp4">
                        Your browser does not support HTML video.
                      </video>
                    </div>
              <?php
                  }
                }
              }
              ?>


            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
          <a style="font-weight:900">FIRMA: </a> <a> <?php echo $row['SIGN_REPORTER'] ?> </a><br>

          <input name=idNews style="display:none;" value="<?php echo $idNoticia ?>"> </input>
 
          <?php
           $Reportero= $_SESSION["user_id"];
          $NewsLikes =  "Select *from news_likes where fk_news='$idNoticia' AND fk_users='$Reportero'";
          $NewsLikesSql = $mysqli->query($NewsLikes);
          
          if($row6= mysqli_fetch_assoc($NewsLikesSql)){
          
          ?>
                    <button type="like" name="like" id="Hola" class='bx bxs-like bx-lg'></button>

          <?php 
          }else{
          ?>
                    <button type="like" name="like" id="Hola" class='bx bx-like bx-lg'></button>

          <?php 
          }
          ?>
          <p><?php echo $row['LIKES'] ?></p>
          <button type="button" class="btn btn-dark">Modificar</button>
          <button type="button" class="btn btn-dark">Validar</button>
          <button type="button" class="btn btn-dark">Eliminar</button>



        </div>

        </div>
    </section>
  <?php
      }
  ?>
  </form>



  <section class="Comentarios">
    <div>
      <a class="imagenComentarios"><img src="img/descarga.jpg" alt="logotipo"></a>
      <h6>Marco David Castillo Cantú</h6>
      <p>Muy buena la musica es increible más noticias como esta un like por merecida noticiaMuy buena la musica es increible más noticias como esta un like por merecida noticiaMuy buena la musica es increible más noticias como esta un like por merecida noticia</p>
      <a style="font-weight:900">Fecha</a><a>25/02/2022 20:10</a><br>
      <a style="font-weight:900"></a><a></a><br>
    </div>
    <button type="button" class="btn btn-primary">Responder</button>
  </section><br>

  <section class="Comentarios2">
    <div>
      <a class="imagenComentarios"><img src="img/descarga.jpg" alt="logotipo"></a>
      <h6>Marco David Castillo Cantú</h6>
      <p>Muy buena la musica es increible más noticias como esta un like por merecida noticiaMuy buena la musica es increible más noticias como esta un like por merecida noticiaMuy buena la musica es increible más noticias como esta un like por merecida noticia</p>
      <a style="font-weight:900">Fecha</a><a>25/02/2022 20:10</a><br>
      <a style="font-weight:900"></a><a></a><br>
    </div>
    <button type="button" class="btn btn-primary">Responder</button>
  </section><br>

  <section class="Comentarios">
    <div>
      <a class="imagenComentarios"><img src="img/descarga.jpg" alt="logotipo"></a>
      <h6>Marco David Castillo Cantú</h6>
      <p>Muy buena la musica es increible más noticias como esta un like por merecida noticiaMuy buena la musica es increible más noticias como esta un like por merecida noticiaMuy buena la musica es increible más noticias como esta un like por merecida noticia</p>
      <a style="font-weight:900">Fecha</a><a>25/02/2022 20:10</a><br>
      <a style="font-weight:900"></a><a></a><br>
    </div>
    <button type="button" class="btn btn-primary">Responder</button>
  </section><br>




  <div class="Escribir2">
    <i class='bx bxs-right-arrow bx-md' style='color:#458c33'></i>
  </div>
  <div class="Escribir">

    <input class="form-control" type="text" placeholder="Escribe un comentario">

  </div>


  <?php include('./Templates/Footer.php') ?>
</body>

</html>