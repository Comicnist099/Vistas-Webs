<!DOCTYPE html>


<html lang="en">
<link rel="stylesheet" href="css/style_noticia_revision.css">
<script src="js/jquery-3.6.0.min.js"></script>

<?php
  require 'conection.php';
  include('./Templates/Nav_Bar.php') ?>

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
  <div class="Titulo2">
  <br>
  <h1>Noticias en revisión</h1>
  </div>
<div class="Titulo">
  <br>
<h5>Buscadores </h5>

<input class="form-control" type="text" placeholder="Palabras Claves"><br>
</div>
<div id="reportrange" >
    <i class="fa fa-calendar"></i>&nbsp;
    <span></span> <i class="fa fa-caret-down"></i>
</div>
</div>
<script type="text/javascript">
$(function() {

    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Hoy': [moment(), moment()],
           'ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Hace 7 días': [moment().subtract(6, 'days'), moment()],
           'Hace 30 días': [moment().subtract(29, 'days'), moment()],
           'Este Mes': [moment().startOf('month'), moment().endOf('month')],
           'Ultimo mes': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);

}) ;
</script>


  


  <div id="sidebar">
    <div class="custom">
      <div class="toggle-btn">
        <span>&#9776;</span>
      </div>
    </div>

    <h1 >SECCIONES</h1><br><br>
    <a>
      <div class="Logo_Secciones">
        <img src="img/ranita.png" style="height:150px" alt="logotipo">
    </a>
  </div>

  <div class="custom">
    <div id="front_videos">
      <div class="large-2">
        <a>Deportes <br> </a>
        <a>Espectaculos <br> </a>
        <a>Deportes <br> </a>
        <a>Espectaculos <br> </a>
        <a>Deportes <br> </a>
        <a>Espectaculos <br> </a>
        <a>Deportes <br> </a>
        <a>Espectaculos <br> </a>
        <a>Deportes <br> </a>
        <a>Espectaculos <br> </a>
        <a>Deportes <br> </a>
        <a>Espectaculos <br> </a>
        <a>Deportes <br> </a>
        <a>Espectaculos <br> </a>


        <div class="force-overflow"></div>
      </div>
    </div>
  </div>
  </div>

 
  <?php
              $revision="Revision";
              $NewsShorts = "Select *from V_News_short where STATE='$revision'";
              $NoticiasShort = $mysqli->query($NewsShorts);
       
              while ($row = mysqli_fetch_assoc($NoticiasShort)) {


              ?>
  <div class="Noticia">
  <div class="ConjuntoImg">
    <?php 
                 $id_News= $row['ID_NEWS'];
                 $NewsMultimedia = "Select *from v_News_multimedia where idNoticia ='$id_News'";
                 $NewsMultimediaShort = $mysqli->query($NewsMultimedia);
                 $contador=0;
                 while ($row3 = mysqli_fetch_assoc($NewsMultimediaShort)){
                 ?>
      
      <a  href="NoticiasEntrar_revision.php?id=<?php echo $row['ID_NEWS'] ?>"  class="imagenPublic"><img src='<?php echo $row3['Multimedia'] ?>' alt="logotipo"></a>
                <?php
                break;
                   
          }
          $NewsShorts=null;

          ?>
    </div>
    <section class="Publicaciones">
   
      <div class="Casilla">
        <div class=CasillaFecha>
          <a style="font-weight:700">Fecha de Publicacion: </a><a><?php echo $row['DATE_PUBLICACION'] ?></a> <br>
          <a style="font-weight:700">Localización: </a><a><?php echo $row['LOCATION'] ?></a><br>
        </div>
        <div class="large-4">
          <?php 
                $id_News= $row['ID_NEWS'];
               
                 $NewsTag = " Select *from V_News_tag where idNoticia ='$id_News'";
                 $NewstagShort = $mysqli->query($NewsTag);

              

                 while ($row2 = mysqli_fetch_assoc($NewstagShort)){
                  $NombreSeccion=$row2['Seccion'];
                  $NewsTagColor = " Select * from tag where `NAME` ='$NombreSeccion'";
                  $NewstagShortColor = $mysqli->query($NewsTagColor);
                  $row4 = mysqli_fetch_array($NewstagShortColor)
 
                 ?>
          <span style="background-color:<?php echo $row4['COLOR'] ?>"><?php echo $row2['Seccion'] ?></span>
          <?php
                  
          }
          $NewsTag=null;
          $NewsTagColor=null;
          ?>
        </div>
        <div class="CasillaTitulo">
          <span > <?php echo $row['TITLE'] ?></span><br>

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

  <?php include('./Templates/Footer.php')?>

 
  <script src="js/Sidebar.js"> </script>
</body>

</html>