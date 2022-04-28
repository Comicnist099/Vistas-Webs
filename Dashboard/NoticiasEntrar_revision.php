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

<body style="background-image:  url('./img/bg.jpg'); background-size: 100% 100%; 
background-attachment: fixed;">
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
            <?php
            $id_News = $row['ID_NEWS'];

            $NewsTag = " Select *from V_News_tag where idNoticia ='$id_News'";
            $NewstagShort = $mysqli->query($NewsTag);



            while ($row2 = mysqli_fetch_assoc($NewstagShort)) {
              $NombreSeccion = $row2['Seccion'];
              $NewsTagColor = " Select * from tag where `NAME` ='$NombreSeccion'";
              $NewstagShortColor = $mysqli->query($NewsTagColor);
              $row4 = mysqli_fetch_array($NewstagShortColor)

            ?>
              <span style="background-color:<?php echo $row4['COLOR'] ?>"><?php echo $row2['Seccion'] ?></span>
            <?php

            }
            $NewsTag = NULL;
            ?>
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
              $NewsMultimedia = NULL;
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
          $Reportero = $_SESSION["user_id"];
          $NewsLikes =  "Select *from news_likes where fk_news='$idNoticia' AND fk_users='$Reportero'";
          $NewsLikesSql = $mysqli->query($NewsLikes);

          if ($row6 = mysqli_fetch_assoc($NewsLikesSql)) {

          ?>
            <button type="like" name="like" id="Hola" class='bx bxs-like bx-lg'></button>

          <?php
          } else {
          ?>
            <button type="like" name="like" id="Hola" class='bx bx-like bx-lg'></button>

          <?php
          }
          $NewsLikes = NULL;
          $idNoticia = $_GET["id"];
          ?>
          <p><?php echo $row['LIKES'] ?></p>
          <div>


            <div class="botones">
              <?php
            $type_user = $_SESSION["user_type"];
              $user2 = $row['FK_REPORTER'];
              $NewsBtn =  "Select *from user where ID_USER='$user2'";
              $NewsBtnSql = $mysqli->query($NewsBtn);
              $row14 = mysqli_fetch_assoc($NewsBtnSql);
              if ($type_user == "3") {
              ?>

                <div class="row2">

                  <div class="column2">

                  <input class="form-control" type="text" name="Comentario" placeholder="Escribe un comentario">
                  <input style="display:none" class="form-control" type="text" name="idNoticia" value="<?php echo $idNoticia ?>" placeholder="Escribe un comentario">

                  </div>
                  <div class="column2">
                   <button type="bajar"  name="bajar" style="float:right" class='bx bxs-right-arrow bx-md btn btn-success'>Bajar</button>
                  </div>
                  <div class="column2">
                  <span> <a style="float:right" class='bx bxs-edit-alt bx-md' href="http://localhost/Frontend/Dashboard/Temp/noticiaValidar_inc.php?idNoticia=<?php echo $idNoticia ?>">Validar</a></span>

                  </div>
                </div>
                

              <?php
              } ?>
            </div>

            <br>


          </div>



        </div>

        </div>
    </section>
  <?php
      }
      $news = null;
  ?>
  </form>
  <?php
  $idNoticia = $_GET["id"];
  $newsRevision = " Select * from news where ID_NEWS ='$idNoticia'";
  $newsRevisionSql = $mysqli->query($newsRevision);
  $row18 = mysqli_fetch_assoc($newsRevisionSql);
  if ($row18['STATE'] == "Aceptada") {
  ?>
    <h2 style="background-color: #80e459;">SECCION COMENTARIOS</h2>
    <?php
    $idNoticia = $_GET["id"];
    $vacio = '';
    $NewsComment =  "Select *from comment where FK_NEWS='$idNoticia' AND FK_COMMENT=0";
    $NewsCommentSql = $mysqli->query($NewsComment);

    while ($row10 = mysqli_fetch_assoc($NewsCommentSql)) {
      $idNoticia = $_GET["id"];
      $user = $row10['FK_USER'];
      $NewsCommentDatos =  "Select *from user where ID_USER='$user'";
      $NewsCommentDatosSql = $mysqli->query($NewsCommentDatos);
      $row8 = mysqli_fetch_assoc($NewsCommentDatosSql);





    ?>

      <section class="Comentarios">
        <div>
          <?php
          $ReporteroComentario = $_SESSION["user_id"];
          $ReporteroId = $row10['FK_USER'];

          if ($ReporteroId == $ReporteroComentario) {
          ?>
            <button style="float:right"><a class='bx bxs-trash bx-md bx-tada-hover' href="http://localhost/Frontend/Dashboard/Temp/eliminar_inc.php?idNoticia=<?php echo $row10['ID_COMMENT']; ?>&idComentario=<?php echo  $_GET["id"]; ?>"></a></button>
            <button style="float:right">
              <a id="BtnEdicion" onClick="
        if(contador==0){
        document.getElementById('<?php echo $row10['ID_COMMENT']; ?>').style.display = 'inline';
        document.getElementById('<?php echo $row10['ID_COMMENT']; ?>content').style.display = 'none'
        document.getElementById('<?php echo $row10['ID_COMMENT']; ?>ButEditar').style.display = 'inline'
        contador=1;
        }
        else{
        document.getElementById('<?php echo $row10['ID_COMMENT']; ?>').style.display = 'none';
        document.getElementById('<?php echo $row10['ID_COMMENT']; ?>content').style.display = 'inline'
        document.getElementById('<?php echo $row10['ID_COMMENT']; ?>ButEditar').style.display = 'none'
        contador=0;
        }

        
        " class='bx bxs-edit-alt bx-md bx-tada-hover'>
              </a>
            </button>

          <?php
          }
          ?>
          <a class="imagenComentarios"><img src="<?php echo $row8['AVATAR_PIC'] ?>" alt="logotipo"></a>
          <h6><?php echo $row8['NAME'] ?></h6>
          <p id='<?php echo $row10['ID_COMMENT']; ?>content'><?php echo $row10['CONTENT'] ?></p><br>


          <form class="form" action="./Temp/comentarioUpdate_inc.php" method="post" enctype="multipart/form-data">

            <input name="EdicionNuevo" style="display:none" id='<?php echo $row10['ID_COMMENT']; ?>' class="form-control" type="text" name="Comentario" value="<?php echo $row10['CONTENT'] ?>" placeholder="Responder el comentario">
            <input name="idComentario" style="display:none" id='<?php echo $row10['ID_COMMENT']; ?>Id' class="form-control" type="text" name="Comentario" value="<?php echo $row10['ID_COMMENT'] ?>">
            <input name="id_News" style="display:none" value='<?php echo $id_News  ?>'>


            <button id='<?php echo $row10['ID_COMMENT']; ?>ButEditar' type="sendEditar" name="sendEditar" style="display:none">
              <a class='bx bxs-right-arrow bx-md'>
              </a>
            </button>
          </form>

          <a style="font-weight:900">Fecha</a><a><?php echo $row10['DATE_CREATION'] ?></a><br>
          <a style="font-weight:900"></a><a></a><br>
        </div>

      </section>

      <?php
      $user =  $row10['ID_COMMENT'];
      $NewsRespuesta =  "Select *from comment where FK_COMMENT='$user'";
      $NewsRespuestaSql = $mysqli->query($NewsRespuesta);
      while ($row11 = mysqli_fetch_assoc($NewsRespuestaSql)) {
        $idNoticia2 = $_GET["id"];
        $user2 = $row11['FK_USER'];
        $NewsCommentDatos2 =  "Select *from user where ID_USER='$user2'";
        $NewsCommentDatosSql2 = $mysqli->query($NewsCommentDatos2);
        $row12 = mysqli_fetch_assoc($NewsCommentDatosSql2);

      ?>
        <br>
        <section class="Comentarios2">
          <?php
          $ReporteroComentario = $_SESSION["user_id"];
          $ReporteroId = $row11['FK_USER'];

          if ($ReporteroId == $ReporteroComentario) {
          ?>
            <button style="float:right"><a class='bx bxs-trash bx-md bx-tada-hover' href="http://localhost/Frontend/Dashboard/Temp/eliminarRespuesta_inc.php?idNoticia=<?php echo $row11['ID_COMMENT']; ?>&idComentario=<?php echo  $_GET["id"]; ?>"></a></button>
            <button style="float:right">
              <a id="BtnEdicion" onClick="
        if(contadorRespuesta==0){
        document.getElementById('<?php echo $row11['ID_COMMENT']; ?>').style.display = 'inline';
        document.getElementById('<?php echo $row11['ID_COMMENT']; ?>content').style.display = 'none'
        document.getElementById('<?php echo $row11['ID_COMMENT']; ?>ButEditar').style.display = 'inline'
        contadorRespuesta=1;
        }
        else{
        document.getElementById('<?php echo $row11['ID_COMMENT']; ?>').style.display = 'none';
        document.getElementById('<?php echo $row11['ID_COMMENT']; ?>content').style.display = 'inline'
        document.getElementById('<?php echo $row11['ID_COMMENT']; ?>ButEditar').style.display = 'none'
        contadorRespuesta=0;
        }

        
        " class='bx bxs-edit-alt bx-md bx-tada-hover'>
              </a>
            </button>
          <?php
          }
          ?>
          <div>
            <a class="imagenComentarios"><img src="<?php echo $row12['AVATAR_PIC'] ?>" alt="logotipo"></a>
            <h6><?php echo $row12['NAME'] ?></h6>
            <p id='<?php echo $row11['ID_COMMENT']; ?>content'><?php echo $row11['CONTENT'] ?></p>

            <form class="form" action="./Temp/comentarioUpdate_inc.php" method="post" enctype="multipart/form-data">

              <input name="EdicionNuevo" style="display:none" id='<?php echo $row11['ID_COMMENT']; ?>' class="form-control" type="text" name="Comentario" value="<?php echo $row11['CONTENT'] ?>" placeholder="Responder el comentario">
              <input name="idComentario" style="display:none" id='<?php echo $row11['ID_COMMENT']; ?>Id' class="form-control" type="text" name="Comentario" value="<?php echo $row11['ID_COMMENT'] ?>">
              <input name="id_News" style="display:none" value='<?php echo $id_News  ?>'>


              <button id='<?php echo $row11['ID_COMMENT']; ?>ButEditar' type="sendEditar" name="sendEditar" style="display:none">
                <a class='bx bxs-right-arrow bx-md'>
                </a>
              </button>
            </form>


            <a style="font-weight:900">Fecha</a><a><?php echo $row11['DATE_CREATION'] ?></a><br>
            <a style="font-weight:900"></a><a></a><br>
          </div>
        </section>
        <br>
      <?php
      }
      ?>


      <form class="form" action="./Temp/respuesta_inc.php" method="post" enctype="multipart/form-data">


        <div>
          <input name=idNews style="display:none;" value="<?php echo $idNoticia ?>"> </input>
          <input name=id_Comentario style="display:none;" value="<?php echo $row10['ID_COMMENT'] ?>"> </input>

          <div id="Respuesta">
            <h5 style=" margin-left: 200px;">Responder</h5>
            <div class="Escribir2">
              <button type="send" name="send" class='bx bxs-right-arrow bx-md' style='color:#458c33'></button>
            </div>
            <div class="Escribir">

              <input class="form-control" type="text" name="Comentario" placeholder="Responder el comentario">

            </div>
          </div>
        </div>

        <br>
        <br>
      </form>


    <?php

    }
    ?>
    <br>


    <h3 style=" margin-left: 200px; font-weight: 1000;">DATE A CONOCER</h3>
    <form class="form" action="./Temp/comentario_inc.php" method="post" enctype="multipart/form-data">
      <input name=idNews style="display:none;" value="<?php echo $idNoticia ?>"> </input>

      <div class="Escribir2">
        <button type="send" name="send" class='bx bxs-right-arrow bx-md' style='color:#458c33'></button>
      </div>
      <div class="Escribir">

        <input class="form-control" type="text" name="Comentario" placeholder="Escribe un comentario">

      </div>
    </form>
  <?php
  }
  ?>
  <script>
    var contador = 0;
    var contadorRespuesta = 0;


    function changeStyle() {
      document.getElementById("Respuesta").style.display = "inline";
    }
  </script>



  <?php include('./Templates/Footer.php') ?>
</body>

</html>