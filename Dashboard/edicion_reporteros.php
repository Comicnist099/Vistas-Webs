

<title>Edicion reporteros</title>

<link rel="stylesheet" href="css/edicion_reporteros.css">
<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
<script src="https://unpkg.com/boxicons@2.1.1/dist/boxicons.js"></script>
<link rel="stylesheet" href="css/foter.css">
<script src="js/jquery-3.6.0.min.js"></script>

<script>
        function mialerta() {  
            alert("Si tienes cuenta ya registrada presiona 'Registrarte aquí' ");
        } 
    </script>

<script src="js/abrir.js"></script>

<body style="background-image:  url('./img/bg.jpg'); background-size: 100% 100%; 
background-attachment: fixed;">
<?php 
require "conection.php";
include('./Templates/Nav_bar.php') ?>
<section>
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
    
  <div class="container">

     
      <div class="user2 singupBx">
          <div class="formBx">
          <form class="form" action="./Temp/UpdateReporteros_inc.php" method="post" enctype="multipart/form-data">
                  <h2>Editar datos de  reportero</h2>

                  <?php
                  $idReportero=$_GET["idUsuario"];
                        $Reporteros = "select * from user where ID_USER='$idReportero';";
                        $ReporterosSql = $mysqli->query($Reporteros);
                        while ($row = mysqli_fetch_assoc($ReporterosSql)) {
                        ?>
                  <div class="form-control">
                      <label for="username">Usuario</label>
                      <input type="text" name="username" placeholder="florinpop17"  id="username" value="<?php echo $row['NAME'] ?>"  />
                      <i class="fas fa-check-circle"></i>
                      <i class="fas fa-exclamation-circle"></i>
                      <small>Error message</small>
                  </div>
                  <div class="form-control">
                      <label for="username">Alias</label>
                      <input type="text" name="alias" placeholder="alias" id="alias" value="<?php echo $row['ALIAS'] ?>"  />
                      <i class="fas fa-check-circle"></i>
                      <i class="fas fa-exclamation-circle"></i>
                      <small>Error message</small>
                  </div>
                  <div style="display:none" class="form-control">
                      <label for="username">Email</label>
                      <input type="email" name="email" placeholder="a@florin-pop.com" id="email" value="<?php echo $row['CORREO'] ?>" />
                      <i class="fas fa-check-circle"></i>
                      <i class="fas fa-exclamation-circle"></i>
                      <small>Error message</small>
                  </div>
                  <div class="form-control">
                      <label for="username">Contraseña</label>
                      <input type="password" name="password" placeholder="********" id="password"  />
                      <i class="fas fa-check-circle"></i>
                      <i class="fas fa-exclamation-circle"></i>
                      <small>Error message</small>
                  </div>
                  <div class="form-control">
                      <label for="username">Escriba de nuevo la contraseña</label>
                      <input type="password" name="password2" laceholder="********" id="password2" />
                      <i class="fas fa-check-circle"></i>
                      <i class="fas fa-exclamation-circle"></i>
                      <small>Error message</small>
                  </div>
                 
    
                  <div class="profile-pic-div">
                      <img src="<?php echo $row['AVATAR_PIC'] ?>"  id="photo">

                      <input  onchange="readURL(this);" type="file" name="photo" id="uploadBtn" value="<?php echo $row['AVATAR_PIC'] ?>" >
                      <label for="file" id="uploadBtn">Subir foto</label>
                  </div>
                  <?php
                        }
                  ?>

    
                <button type="submit" name="submit"> Modificar</button>
                
              </form>
          </div>
          
          
          
          
          
          
          
             <div class="imgBx">
                             <img src="img/ranaportero.jpg"> 
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








