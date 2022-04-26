<title>Registro reporteros</title>

<link rel="stylesheet" href="css/registro_reporteros.css">
<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
<script src="https://unpkg.com/boxicons@2.1.1/dist/boxicons.js"></script>
<link rel="stylesheet" href="css/foter.css">
<script src="js/jquery-3.6.0.min.js"></script>

<script>
    function mialerta() {
        alert("Si tienes cuenta ya registrada presiona 'Registrarte aquí' ");
    }
</script>
<script>
    function readURL(input) {

        var fileInput = document.getElementById('uploadBtn');
        var filePath = fileInput.value;

        var allowedExtensions = /(.jpg|.jpeg|.png)$/i;

        if (!allowedExtensions.exec(filePath)) {
            alert('XD!');
            fileInput.value = '';
            return false;
        } else {
            if (input.files)
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#photo').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
        }

    }
</script>
<script src="js/abrir.js"></script>

<body style="background-image:  url('./img/bg.jpg'); background-size: 100% 100%; 
background-attachment: fixed;">
    <?php

    require "conection.php";
    include('./Templates/Nav_bar.php') ?>
    <section>


        <div class="container">


            <div class="user2 singupBx">
                <div class="formBx">
                    <form class="form" action="./Temp/registerReportero_inc.php" method="post" enctype="multipart/form-data">
                        <h2>Registrar reportero</h2>
                        <div class="form-control">
                            <label for="username">Usuario</label>
                            <input type="text" name="username" placeholder="florinpop17" id="username" />
                            <i class="fas fa-check-circle"></i>
                            <i class="fas fa-exclamation-circle"></i>
                            <small>Error message</small>
                        </div>
                        <div class="form-control">
                            <label for="username">Alias</label>
                            <input type="text" name="alias" placeholder="alias" id="alias" />
                            <i class="fas fa-check-circle"></i>
                            <i class="fas fa-exclamation-circle"></i>
                            <small>Error message</small>
                        </div>
                        <div class="form-control">
                            <label for="username">Email</label>
                            <input type="email" name="email" placeholder="a@florin-pop.com" id="email" />
                            <i class="fas fa-check-circle"></i>
                            <i class="fas fa-exclamation-circle"></i>
                            <small>Error message</small>
                        </div>
                        <div class="form-control">
                            <label for="username">Contraseña</label>
                            <input type="password" name="password" placeholder="********" id="password" />
                            <i class="fas fa-check-circle"></i>
                            <i class="fas fa-exclamation-circle"></i>
                            <small>Error message</small>
                        </div>
                        <div class="form-control">
                            <label for="username">Escriba de nuevo la contraseña</label>
                            <input type="password" name="password2" placeholder="********" id="password2" />
                            <i class="fas fa-check-circle"></i>
                            <i class="fas fa-exclamation-circle"></i>
                            <small>Error message</small>
                        </div>

                        <div class="profile-pic-div">
                            <img src="img/avatar.png" id="photo">
                            <input type="file" name="photo" id="uploadBtn" onchange="readURL(this);">
                            <label for="file" id="uploadBtn">Subir foto</label>
                        </div>


                        <button type="submit" name="submit"> Registrar</button>

                    </form>
                </div>







                <div class="imgBx">
                    <h2>REPORTEROS</h2>

                    <div class="contenedor">
                        <?php
                        $Reporteros = "select * from user where USER_TYPE=2;";
                        $ReporterosSql = $mysqli->query($Reporteros);
                        while ($row = mysqli_fetch_assoc($ReporterosSql)) {
                        ?>

                            <div class="card">
                                <div class="content">
                                    <div class="img">
                                        <img src="<?php echo $row['AVATAR_PIC'] ?>" alt="">
                                    </div>
                                    <div class="details">
                                        <span class="name"><?php echo $row['NAME'] ?></span>
                                        <div class="botones">
                                          <span> <a  href="http://localhost/Frontend/Dashboard/edicion_reporteros.php?idUsuario=<?php echo $row['ID_USER'] ?>" class='bx bxs-edit bx-md btn btn-success '> </a></span>
        
                                            <span> <a  href="http://localhost/Frontend/Dashboard/Temp/eliminarReportero_inc.php?idUsuario=<?php echo $row['ID_USER'] ?>" class='bx bxs-trash bx-md btn btn-success '> </a></span>
                                         
                                        </div>
                                    </div>


                                </div>

                            </div>
                        <?php
                        }
                        ?>
                    </div>


                </div>

            </div>
        </div>

    </section>
    <script src="js/traslacion.js">
    </script>

    <script src="js/validaciones.js">
    </script>
    <script src="js/SubirFoto.js">
    </script>


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