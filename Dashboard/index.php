<!DOCTYPE html>


<html lang="en">
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery-3.6.0.min.js"></script>

<?php include('./Templates/Nav_bar.php') ?>


<body>
  <br>
  <div class="ContenedorBus">
    
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

});
</script>

  <section class="Reciente">
    <h1>POPULARES</h1><br><br><br>
    <div class=ConjuntoNoticias>
      <span Class="Noticia1">SANTAS CACHUCHAS LO AGARRON CON EL TINNER Y RATA EN MANO</span>
      <span Class="Noticia2">SANTAS CACHUCHAS LO AGARRON CON EL TINNER Y RATA EN MANO</span>
      <span Class="Noticia3">SANTAS CACHUCHAS LO AGARRON CON EL TINNER Y RATA EN MANO</span>
    </div>

  </section>

  


  <div id="sidebar">
    <div class="custom">
      <div class="toggle-btn">
        <span>&#9776;</span>
      </div>
    </div>

    <h1 style="font-weight:400">SECCIONES</h1><br><br>
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

 


  <div class="Noticia">
    <div class="ConjuntoImg">
      <a class="imagenPublic"><img src="img/descarga.jpg" alt="logotipo"></a>

    </div>
    <section class="Publicaciones">
      <div class="Casilla">
        <div class=CasillaFecha>
          <a style="font-weight:700">Fecha de Publicacion: </a><a>28/21/2022</a> <br>
          <a style="font-weight:700">Localización: </a><a>Colonia, </a><a>Ciudad, </a><a>Pais </a><br>
        </div>
        <div class="large-4">
          <span>Deportes</span>
          <span>Deportes</span>
          <span>Deportes</span>
        </div>
        <div class="CasillaTitulo">
          <span > TUSA DOS CONFIRMADA NO PUEDE SER INCREIBLE!!!!!!!!!</span><br>

        </div>
        <div class="large-3" style="font-weight:700">
          <a>Escrible no puede ser el gran hit ahora tiene una gran secuela Escrible no puede ser el gran hit ahora
            tiene una gran secuela Escrible no puede ser el gran hit ahora tiene una gran secuela Escrible no puede ser
            el gran hit ahora tiene una gran secuela Escrible no puede ser el gran hit ahora tiene una gran secuela
            Escrible no puede ser el gran hit ahora tiene una gran secuela Escrible no puede ser el gran hit ahora tiene
            una gran secuela</a>
        </div>

        <br><br><br>
      </div>
    </section>
  </div>

  <div class="Noticia">
    <div class="ConjuntoImg">
      <a class="imagenPublic"><img src="img/descarga.jpg" alt="logotipo"></a>

    </div>
    <section class="Publicaciones">


      <div class="Casilla">

        <div class=CasillaFecha>

          <a style="font-weight:700">Fecha de Publicacion: </a><a>28/21/2022</a> <br>
          <a style="font-weight:700">Localización: </a><a>Colonia, </a><a>Ciudad, </a><a>Pais </a><br>

        </div>
        <div class="large-4">
          <span>Deportes</span>
          <span>Deportes</span>
          <span>Deportes</span>

        </div>


        <div class="CasillaTitulo">
          <span style=" font-weight:900"> TUSA DOS CONFIRMADA NO PUEDE SER INCREIBLE!!!!!!!!!</span><br>

        </div>
        <div class="large-3" style="font-weight:700">
          <a>Escrible no puede ser el gran hit ahora tiene una gran secuela Escrible no puede ser el gran hit ahora
            tiene una gran secuela Escrible no puede ser el gran hit ahora tiene una gran secuela Escrible no puede ser
            el gran hit ahora tiene una gran secuela Escrible no puede ser el gran hit ahora tiene una gran secuela
            Escrible no puede ser el gran hit ahora tiene una gran secuela Escrible no puede ser el gran hit ahora tiene
            una gran secuela</a>
        </div>

        <br><br><br>

      </div>
    </section>
  </div>
  <div class="Noticia">
    <div class="ConjuntoImg">
      <a class="imagenPublic"><img src="img/descarga.jpg" alt="logotipo"></a>

    </div>
    <section class="Publicaciones">


      <div class="Casilla">

        <div class=CasillaFecha>

          <a style="font-weight:700">Fecha de Publicacion: </a><a>28/21/2022</a> <br>
          <a style="font-weight:700">Localización: </a><a>Colonia, </a><a>Ciudad, </a><a>Pais </a><br>

        </div>
        <div class="large-4">
          <span>Deportes</span>
          <span>Deportes</span>
          <span>Deportes</span>

        </div>


        <div class="CasillaTitulo">
          <span style=" font-weight:900"> TUSA DOS CONFIRMADA NO PUEDE SER INCREIBLE!!!!!!!!!</span><br>

        </div>
        <div class="large-3" style="font-weight:700">
          <a>Escrible no puede ser el gran hit ahora tiene una gran secuela Escrible no puede ser el gran hit ahora
            tiene una gran secuela Escrible no puede ser el gran hit ahora tiene una gran secuela Escrible no puede ser
            el gran hit ahora tiene una gran secuela Escrible no puede ser el gran hit ahora tiene una gran secuela
            Escrible no puede ser el gran hit ahora tiene una gran secuela Escrible no puede ser el gran hit ahora tiene
            una gran secuela</a>
        </div>

        <br><br><br>

      </div>
    </section>
  </div>
  <div class="Noticia">
    <div class="ConjuntoImg">
      <a class="imagenPublic"><img src="img/descarga.jpg" alt="logotipo"></a>

    </div>
    <section class="Publicaciones">


      <div class="Casilla">

        <div class=CasillaFecha>

          <a style="font-weight:700">Fecha de Publicacion: </a><a>28/21/2022</a> <br>
          <a style="font-weight:700">Localización: </a><a>Colonia, </a><a>Ciudad, </a><a>Pais </a><br>

        </div>
        <div class="large-4">
          <span>Deportes</span>
          <span>Deportes</span>
          <span>Deportes</span>

        </div>


        <div class="CasillaTitulo">
          <span style=" font-weight:900"> TUSA DOS CONFIRMADA NO PUEDE SER INCREIBLE!!!!!!!!!</span><br>

        </div>
        <div class="large-3" style="font-weight:700">
          <a>Escrible no puede ser el gran hit ahora tiene una gran secuela Escrible no puede ser el gran hit ahora
            tiene una gran secuela Escrible no puede ser el gran hit ahora tiene una gran secuela Escrible no puede ser
            el gran hit ahora tiene una gran secuela Escrible no puede ser el gran hit ahora tiene una gran secuela
            Escrible no puede ser el gran hit ahora tiene una gran secuela Escrible no puede ser el gran hit ahora tiene
            una gran secuela</a>
        </div>

        <br><br><br>

      </div>
    </section>
  </div>

  <?php include('./Templates/Footer.php')?>

 
  <script src="js/Sidebar.js"> </script>
</body>

</html>