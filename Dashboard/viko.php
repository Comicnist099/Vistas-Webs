<title>Pagina login</title>

<link rel="stylesheet" href="css/sidebar2.css">
<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
<script src="https://unpkg.com/boxicons@2.1.1/dist/boxicons.js"></script>

<script src="js/jquery-3.6.0.min.js"></script>
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
                        $('#Moni').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
        }

    }
</script>
<script>
    function mialerta() {
        alert("Si tienes cuenta ya registrada presiona 'Registrarte aquí' ");
    }
</script>

<body style="background-image:  url('./img/bg.jpg'); background-size: 100% 100%; 
background-attachment: fixed;

">

    <section>
        <div class="container">

            <div class="user singinBx">
                <div class="imgBx"><img src="img/perrito.jfif"> </div>
                <div class="formBx">

                    <form class="form" action="./Temp/login_inc.php" method="post" enctype="multipart/form-data">
                        <h2>Entra</h2>
                        <label for="username">Correo</label>

                        <input type="text" name="Correo" placeholder="user">
                        <label for="username">Contraseña</label>

                        <input type="password" name="pass" placeholder="Contraseña">
                        <button type="submit" name="submit"> login</button>
                        <!-----------------------------------REGISTRO--------------------------------------------------------->
                        <p class="signup">No tienes cuenta aún?<a href="#" onclick="toggleForm();
                            ">Registrate aqui </a></p>
                    </form>
                </div>
            </div>
            <div class="user2 singupBx">
                <div class="formBx">
                    <form class="form" action="./Temp/register_inc.php" method="post" enctype="multipart/form-data">
                        <h2>Registrate</h2>

                        <div class="form-control">
                            <label for="username">Usuario</label>
                            <input type="text" name="username" placeholder="florinpop17" id="username" />
                            <i class="fas fa-check-circle"></i>
                            <i class="fas fa-exclamation-circle"></i>
                            <small>Error message</small>
                        </div>
                        <div class="form-control">
                            <label for="username">Alias</label>
                            <input type="text" name="Alias" placeholder="alias" id="alias" />
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
                            <input type="password" placeholder="********" id="password2" name="password2" />
                            <i class="fas fa-check-circle"></i>
                            <i class="fas fa-exclamation-circle"></i>
                            <small>Error message</small>
                        </div>

                        <div class="profile-pic-div">

                            <img src="img/avatar.png" id="Moni">
                            <input type="file" name="photo" id="uploadBtn" onchange="readURL(this);">



                        </div>


                        <button type="submit" name="submit"> Registrarse</button>

                        <br>
                        <p class="signup">Ya tienes cuenta?<a href="#" onclick="mialerta();" onclick="toggleForm();
                            ">Entra aqui
                            </a></p>
                    </form>
                </div>
                <div class="imgBx"><img src="img/descarga.jpg"> </div>

            </div>
        </div>

    </section>
    <script src="js/traslacion.js">
    </script>

    <script src="js/validaciones.js">
    </script>
</body>

</html>