<!DOCTYPE html>

<html lang="en">
<link rel="stylesheet" href="css/style_noticia_revision.css">
<script src="js/jquery-3.6.0.min.js"></script>

<?php
require "conection.php";

include('./Templates/Nav_bar.php') ?>



<script>
  function mialerta() {
    alert("Bienvenido, Entra y conoce un mundo nuevo de noticias");
  }
</script>

<body style="background-image:  url('./img/bg.jpg'); background-size: 100% 100%; 
background-attachment: fixed;

">
  <br>
  <div class="ContenedorBus">
    <h1 style="margin-left:400px">NOTICIAS RELEVANTES </h1>
    <div class="Titulo">
      <br>
      <h5>Buscadores </h5>


</html>
<input class="form-control" type="text" placeholder="Palabras Claves">


</div>
</div>
<br><br><br><br><br><br>

<section class="Reciente">
  <h1>POPULARES</h1><br>
  <?php
  $Destacados = "SELECT * FROM news where STATE='Aceptada' ORDER BY LIKES DESC;";
  $DestacadosSql = $mysqli->query($Destacados);

  $contador = 0;


  while ($row = mysqli_fetch_assoc($DestacadosSql)) {

    $id_newsDestacada = $row['ID_NEWS'];
    $Imagenes = "SELECT * FROM gallery_news where FK_NEWS='$id_newsDestacada';";
    $ImagenesSql = $mysqli->query($Imagenes);
    $row4 = mysqli_fetch_assoc($ImagenesSql);
    if ($contador < 3) {
  ?>

    <div class=card>

        <a href="Noticias_index.php?id=<?php echo $row['ID_NEWS'] ?>"><img src='<?php echo $row4['MULTIMEDIA'] ?>' alt="img"></a>
        <h1><?php echo $row['TITLE'] ?></h1>

    </div>
<?php
      }
      $contador++;

    }
?>

</section>




<div id="sidebar">
  <div class="custom">
    <div class="toggle-btn">
      <span>&#9776;</span>
    </div>
  </div>

  <h1>SECCIONES</h1><br><br>
  <a>
    <div class="Logo_Secciones">
      <img src="img/ranita.png" style="height:150px" alt="logotipo">
  </a>
</div>
<?php
$secciones = "select * from V_tag;";
$categorias = $mysqli->query($secciones);

?>
<div class="custom">
  <div id="front_videos">
    <div class="large-2">
      <?php
      while ($row = mysqli_fetch_assoc($categorias)) {


      ?>

        <a href="index_Secciones.php?Seccion=<?php echo $row['NOMBRE'] ?>" style=" color: black; text-decoration: none; background-color: <?php echo $row['color'] ?>;"><?php echo $row['NOMBRE'] ?> <br> </a>
      <?php
      }
      $categorias = null;

      ?>

      <div class="force-overflow"></div>
    </div>
  </div>
</div>
</div>


<?php
$revision = "Aceptada";
$NewsShorts = "Select *from V_News_short where STATE='$revision'";
$NoticiasShort = $mysqli->query($NewsShorts);

while ($row = mysqli_fetch_assoc($NoticiasShort)) {

?>

  <div class="Noticia">

    <div class="ConjuntoImg">
      <?php
      $id_News = $row['ID_NEWS'];
      $NewsMultimedia = "Select *from v_News_multimedia where idNoticia ='$id_News'";
      $NewsMultimediaShort = $mysqli->query($NewsMultimedia);
      $contador = 0;
      while ($row3 = mysqli_fetch_assoc($NewsMultimediaShort)) {
      ?>

        <a href="Noticias_index.php?id=<?php echo $row['ID_NEWS'] ?>" class="imagenPublic"><img src='<?php echo $row3['Multimedia'] ?>' alt="logotipo"></a>
      <?php
        break;
      }
      $NewsShorts = null;
      $NewsMultimedia = null;
      $row3 = NULL;

      ?>
    </div>
    <section class="Publicaciones">

      <div class="Casilla">
        <?php
        if (isset($_SESSION["user_id"])) {
          $idNoticia2 = $row["ID_NEWS"];

          if ($row['FK_REPORTER'] == $_SESSION["user_id"]) {
        ?>

            <img style="display:block; margin:auto;   height: 50px; " src="./img/separador2.png" alt="">
        <?php
          }
        }
        ?>
        <div class=CasillaFecha>
          <a style="font-weight:700">Fecha de Publicacion: </a><a><?php echo $row['DATE_PUBLICACION'] ?></a> <br>
          <a style="font-weight:700">Localización: </a><a><?php echo $row['LOCATION'] ?></a><br>
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
          $NewsTag = null;
          $NewsTagColor = null;
          ?>
        </div>
        <div class="CasillaTitulo">
          <span> <?php echo $row['TITLE'] ?></span><br>

        </div>
        <div class="large-3" style="font-weight:700">
          <a><?php echo $row['CONTENIDO'] ?></a>
        </div>

        <br><br><br>
      </div>
    </section>
  </div>


<?php
}

$categorias = null;
?>

</div>


<?php include('./Templates/Footer.php') ?>


<script src="js/Sidebar.js"> </script>
</body>

</html>