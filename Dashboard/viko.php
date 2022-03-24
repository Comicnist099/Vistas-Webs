

<title>Pagina login</title>

<link rel="stylesheet" href="css/sidebar2.css">
<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
<script src="https://unpkg.com/boxicons@2.1.1/dist/boxicons.js"></script>

<script src="js/jquery-3.6.0.min.js"></script>

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

                    <form>
                        <h2>Entra</h2>
                        <label for="username">Usuario</label>

                        <input type="text" name="" placeholder="user">
                        <label for="username">Contraseña</label>

                        <input type="password" name="" placeholder="Contraseña">
                        <input type="submit" name="" value="Login">
                        <!-----------------------------------REGISTRO--------------------------------------------------------->
                        <p class="signup">No tienes cuenta aún?<a href="#" onclick="toggleForm();
                            ">Registrate aqui </a></p>
                    </form>
                </div>
            </div>
            <div class="user2 singupBx">
                <div class="formBx">
                    <form id="form" class="form">
                        <h2>Registrate</h2>

                        <div class="form-control">
                            <label for="username">Usuario</label>
                            <input type="text" name="username" placeholder="florinpop17"  id="username" />
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
                            <input type="password" placeholder="********" id="password2" />
                            <i class="fas fa-check-circle"></i>
                            <i class="fas fa-exclamation-circle"></i>
                            <small>Error message</small>
                        </div>

                        <div class="form-control">
                            <label for="username">Fecha de nacimiento</label>
                            <input type="date" placeholder="Fecha de nacimiento" name="birthday" id="date" size="50" class="form-control" min="1910-01-01" max="2020-01-01">
                            <i class="fas fa-check-circle"></i>
                            <i class="fas fa-exclamation-circle"></i>
                            <small>Error message</small>
                        </div>
          
                        <div class="profile-pic-div">
                            <img src="img/avatar.png" id="photo">
                            <input type="file" name="photo" id="file">
                            <label for="file" id="uploadBtn">Subir foto</label>
                        </div>

                        <script src="js/SubirFoto.js"></script>
          
                        <button >  Registrarse</button>
                        <br>
                        <p class="signup">Ya tienes cuenta?<a href="#"    onclick="mialerta();" onclick="toggleForm();
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