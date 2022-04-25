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
    <script src="js/abrir.js"></script>

    <?php
    require "conection.php";
    include('./Templates/Nav_Bar.php') ?>
    <header class="header">
        <h3>CATEGORIAS</h3>



    </header>
    <section>
        <div class="sets">

            <div><img src="./img/f6.png"></div>
            <div><img src="./img/f2.png"></div>
            <div><img src="./img/f3.png"></div>
            <div><img src="./img/f7.png"></div>
            <div><img src="./img/f1.png"></div>
            <div><img src="./img/f5.png"></div>

            <div><img src="./img/f4.png"></div>





        </div>
    </section>


    <div class="cont">
        <form class="form" action="./Temp/seccion_inc.php" method="post" enctype="multipart/form-data">
            <div class="categorias_input">
                <h3>Ingrese el nombre de la categoría:</h3>
                <input name="name" type="text" id="txt">
                <h3>Color:</h3>
                <input type="color" id="colorPicker" value="#6a5acd">
                <input type="text" name="box" id="box">

            </div>

            <div class="btns">
                <button type="anadir" name="anadir"> Añadir</button>
            </div>
        </form>

        <div class="lista">
            <ul id="list">
                <?php
                $secciones = "select * from tag;";
                $categorias = $mysqli->query($secciones);
                while ($row = mysqli_fetch_assoc($categorias)) {


                ?>
                    <li style=" background-color: <?php echo $row['COLOR'] ?>"> <?php echo $row['NAME'] ?>
                    <a style="float:right" class='bx bxs-trash bx-md bx-tada-hover' href="http://localhost/Frontend/Dashboard/Temp/eliminarTag_inc.php?idTag=<?php echo $row['ID_TAG'] ?>"></a>
                    <a style="float:right"  class='bx bxs-edit-alt bx-md bx-tada-hover' href="http://localhost/Frontend/Dashboard/secciones_editar.php?idTag=<?php echo $row['ID_TAG'] ?>"></a>

                </li>
                <?php
        
                }
                $categorias=null;
                ?>
            </ul>
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




    <?php include('./Templates/Footer.php') ?>


</body>