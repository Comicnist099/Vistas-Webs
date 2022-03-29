
 
 <head>
 
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
 integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">

<meta charset="utf-8" />
<title>Dashboard</title>
<link rel="stylesheet" href="css/Nav_Bar.css">

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
</head>

<header style="background:rgb(185, 219, 91) !important">
<div class="inner-width">
<a href="index.php" title="NOTIPAPU!!!" class="logo bx-flashing-hover"><img src="img/logonotipapus.png" alt=""></a>
<i class='menu-toggle-btn bx bx-menu bx-md'></i>
<nav class="navigation-menu">
 

 <a href="ListaUsuarios.php" title="Lista Usuarios" id="Nosotros" class='bx bxs-user-detail bx-md bx-tada-hover bx-border'></i></a>

<a href="secciones.php" title="Secciones" id="Nosotros" class='bx bx-list-ol bx-md bx-tada-hover bx-border'></i></a>

 <a href="nosotros.php" title="Sobre Nosotros" id="Nosotros" class='bx bx-align-left bx-md bx-tada-hover bx-border'></i></a>
 
 <a href="Crear_Noticia.php" title="Crear Nota" id="Notas" class='bx bxs-note bx-md bx-tada-hover bx-border '></i></a>
 <a href="index.php" title="Inicio" id="Casa" class='crear bx bxs-home bx-md bx-tada-hover bx-border'></i></a>
 <!-- <a href="Perfil.php" title="Perfil" id="Perfil" class='bx bxs-user-circle bx-md bx-tada-hover bx-border'></i></a>-->
 <a href="Perfil.php" >

    <?php 
    session_start();
    if(isset($_SESSION["IMAGE_SEARCH"])){
        $image = $_SESSION["image"];
?>

        <img class="a"i src='<?php echo $image; ?>'/>

<?php 
    }
?>
 

    
    </a>
 <a href="viko.php" id="Cerrar">Cerrar sesión</a>

</nav>

</header>
</head>
<script src="js/abrir.js"> </script>