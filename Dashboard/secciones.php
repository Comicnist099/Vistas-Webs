<!DOCTYPE html>
<html>
<title>Secciones</title>

<link rel="stylesheet" href="css/secciones.css">
<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">

<link rel="stylesheet" href="css/Nav_Bar.css">
<script src="js/jquery-3.6.0.min.js"></script>

<body style="background-image:  url('./img/bg.jpg'); background-repeat: no-repeat;  background-size: cover;
">
<script src="js/abrir.js">


    </script>
<?php include('./Templates/Nav_Bar.php')?>
<div class="inside">

    <header class="header">
        <h3>CATEGORIAS</h3>
        <img  class="imagen" src="./img/banner4.png" alt="Italian Trulli" style="align-items: center;">


    </header>
    <form class="form" action="./Temp/seccion_inc.php" method="post" enctype="multipart/form-data">
    <div class="cont">
        <input type="text"  name="name" id="txt">
    <div class="main">
  
        <!-- To select the color -->
        Color Categoria <input type="color" id="colorPicker" value="#6a5acd">

        <div style='display:none'>
        Hex Code: <input type="text" name="box" id="box">
        </div>
    </div>
  
    <script>
        function myColor() {  
            // Get the value return by color picker
            var color = document.getElementById('colorPicker').value;
            // Set the color as background
            document.body.style.backgroundColor = color;
  
            // Take the hex code
            document.getElementById('box').value = color;
        }
        // When user clicks over color picker,
        // myColor() function is called
        document.getElementById('colorPicker')
            .addEventListener('input', myColor);
    </script>


        <div class="btns">
            <button type="submit" name="submit">  Añadir</button>
            <button type="submit" name="editar">Editar</button>
            <button type="Eliminar" name="Eliminar" >Eliminar</button>
        </div>
    </form>
        <ul id="list">
        </ul>

    </div>
    </div>

   
    <footer>
        <div class="footer-content">
            <h3>Colaboradores</h3>


            <a>Marco David Castillo Cantú</a>

            <a>Victoria Rivas Salas</a>

            </ul>
        </div>

        <div class="footer-bottom">
            <p> © 2020 Copyright: Notipapu</p>
        </div>
    </footer>

</body>

</html>