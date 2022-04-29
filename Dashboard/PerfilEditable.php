<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="css/Perfil.css">
<?php 
require 'conection.php';
include('./Templates/Nav_Bar.php') ?>

<body>
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
                            $('#uploadBtn2').attr('src', e.target.result);
                        }

                        reader.readAsDataURL(input.files[0]);
                    }
            }

        }
    </script>
    <?php


    if (isset($_SESSION["user_id"])) {
        $id_user = $_SESSION["user_id"];
        $user = "Select *from user where ID_USER='$id_user'";
        $userSql = $mysqli->query($user);
        while ($row = mysqli_fetch_assoc($userSql)) {

    ?>
            <div class="Columnas">
                <form class="form" action="./Temp/modify_inc.php" method="post" enctype="multipart/form-data">

                    <h1>DATOS PERSONALES</h1><br><br>
                    <em>Nombre</em><br>
                    <input name="Nombre" type="text" value="<?php echo $row['NAME'] ?>" required><br>
                    <em>Alias</em><br>
                    <input name="Alias" type="text" value="<?php echo $row['ALIAS'] ?>" required><br>
                    <em>Correo Electronico</em><br>
                    <input style="display:none" name="Correo" type="email" value="<?php echo $row['CORREO'] ?>" required><br>
                    
                    <input type="text" placeholder="<?php echo $row['CREATION_DATE'] ?>" readonly><br>
                    <em>Contraseña</em><br>
                    <input name="pass" type="password" required><br>
                    <img id="uploadBtn2" class="Perfil" i src='<?php echo $image; ?>' />
                    <input type="file" name="photo" id="uploadBtn" onchange="readURL(this);" required>

                    <input type="submit" name="submit" value="Guardar cambios"><br><br><br><br><br>
            <?php
        }
    }
            ?>
                </form>
                <a href="http://localhost/Frontend/Dashboard/Temp/eliminarUsuario_inc.php" class="btn btn-danger">Eliminar usuario</a>

</body>


</html>