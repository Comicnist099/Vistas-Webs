<!DOCTYPE html>
<html lang="en">

<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://unpkg.com/boxicons@2.1.1/dist/boxicons.js"></script>
<link rel="stylesheet" href="css/ListaUsuarios_Estilo.css">

<link rel="stylesheet" href="css/foter.css">

<link rel="stylesheet" href="css/Nav_Bar.css">
<title>Document</title>


<body style="background-image:  url('./img/bg.jpg'); background-repeat: no-repeat;  background-size: cover;
">
    
<?php include('./Templates/Nav_Bar.php')?>
    <header class="header">
    <h1>Lista de usuarios</h1>


    </header>
    <div class="container">
        <div class="wrapper">
            <div class="outer">
                <!---------------------------------------PRIMER USUARIO------------------------------------>
                <div class="card">
                    <div class="content">
                        <div class="img">
                            <img src="img/marco.png" alt="">
                        </div>
                        <div class="details">
                            <span class="name">Marco Cantu</span>
                            <p>Desarrollador</p>
                        </div>
                        <a href="https://www.youtube.com/watch?v=mtLtPC-Yz-g">Ver mas...</a>

                    </div>

                </div>
                <!---------------------------------------SEGUNDO USUARIO------------------------------------>
                <div class="card">
                    <div class="content">
                        <div class="img">
                            <img src="img/viko.png" alt="">
                        </div>
                        <div class="details">
                            <span class="name">Victoria Rivas</span>
                            <p>Diseñadora</p>
                        </div>
                        <a href="#">Ver mas...</a>

                    </div>
                </div>
                <!---------------------------------------TERCER USUARIO------------------------------------>
                <div class="card ">
                    <div class="content">
                        <div class="img">
                            <img src="img/perro.png" alt="">
                        </div>
                        <div class="details">
                            <span class="name">Perrito</span>
                            <p>Mascota</p>
                        </div>
                        <a href="#">Ver mas...</a>

                    </div>

                </div>
                <!---------------------------------------CUARTO USUARIO------------------------------------>
                <div class="card">
                    <div class="content">
                        <div class="img">
                            <img src="img/rana.png" alt="">
                        </div>
                        <div class="details">
                            <span class="name">Ranita</span>
                            <p>Mascotita</p>
                        </div>
                        <a href="#">Ver mas...</a>

                    </div>

                </div>
            </div>
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