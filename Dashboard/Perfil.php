<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="css/Perfil.css">
<?php
require 'conection.php';
include('./Templates/Nav_Bar.php') ?>

<body style="background-image:  url('./img/bg.jpg'); background-repeat: no-repeat;  background-size: cover;
">




    <?php

    if (isset($_SESSION["image"])) {
        $image = $_SESSION["image"];
        $username = $_SESSION["username"];
        $date = $_SESSION["date"];
        $name = $_SESSION["name"];
        $correo = $_SESSION["user_login"];

    ?>


        <div class="Columnas">

            <h1>DATOS PERSONALES</h1>
            <em>Nombre</em><br>
            <input type="text" placeholder=<?php echo $name; ?> readonly><br>
            <em>Alias</em><br>
            <input type="text" placeholder=<?php echo $username; ?> readonly><br>
            <em>Correo Electronico</em><br>
            <input type="text" placeholder=<?php echo $correo; ?> readonly><br>
            <em>Fecha de Creacion</em><br>
            <input type="text" placeholder=<?php echo $date; ?> readonly><br>
            <div class="profile-pic-div">
                <img class="Perfil" i src='<?php echo $image; ?>' />

            <?php
        }
            ?>

            </div>
            <a type="button" id="subir" href="PerfilEditable.php" class="btn btn-primary btn-lg">Modificar Informacion</a>
        </div>
        </form>





        <?php
        $revision = "Bajada";
        $NewsShorts = "Select *from V_News_short where STATE='$revision'";
        $NoticiasShort = $mysqli->query($NewsShorts);
        $Reportero = $_SESSION["user_id"];
        while ($row = mysqli_fetch_assoc($NoticiasShort)) {
            if ($row['FK_REPORTER'] == $Reportero) {
        ?>
                <div class="Noticia">
                    <div class="ConjuntoImg">
                        <?php
                        $id_News = $row['ID_NEWS'];
                        $NewsMultimedia = "Select *from v_News_multimedia where idNoticia ='$id_News'";
                        $NewsMultimediaShort = $mysqli->query($NewsMultimedia);
                        $contador = 0;
                        while ($row3 = mysqli_fetch_assoc($NewsMultimediaShort)) {
                        ?>

                            <a href="NoticiasEntrar_revision.php?id=<?php echo $row['ID_NEWS'] ?>" class="imagenPublic"><img src='<?php echo $row3['Multimedia'] ?>' alt="logotipo"></a>
                        <?php
                            break;
                        }
                        $NewsShorts = null;

                        ?>
                    </div>
                    <section class="Publicaciones">

                        <div class="Casilla">
                            <div class=CasillaFecha>
                                <a style="font-weight:700">Fecha de Publicacion: </a><a><?php echo $row['DATE_PUBLICACION'] ?></a> <br>
                                <a style="font-weight:700">Localización: </a><a><?php echo $row['LOCATION'] ?></a><br>
                            </div>
                            <div class="large-4">
                                <?php
                                $id_News = $row['ID_NEWS'];

                                $NewsTag = " Select *from V_News_tag where idNoticia ='$id_News'";
                                $NewstagShort = $mysqli->query($NewsTag);



                                while ($row2 = mysqli_fetch_assoc($NewstagShort)) {
                                    $NombreSeccion = $row2['Seccion'];
                                    $NewsTagColor = " Select * from tag where `NAME` ='$NombreSeccion'";
                                    $NewstagShortColor = $mysqli->query($NewsTagColor);
                                    $row4 = mysqli_fetch_array($NewstagShortColor)

                                ?>
                                    <span style="background-color:<?php echo $row4['COLOR'] ?>"><?php echo $row2['Seccion'] ?></span>
                                <?php

                                }
                                $NewsTag = null;
                                $NewsTagColor = null;
                                ?>
                            </div>
                            <div class="CasillaTitulo">
                                <span> <?php echo $row['TITLE'] ?></span><br>

                            </div>
                            <div class="large-3" style="font-weight:700">
                                <a><?php echo $row['CONTENIDO'] ?></a>
                                <?php
                                $buffer=$row['Comentario'];
                                if ( $buffer!== "") {
                                ?>
                                    <h4>COMENTARIO DEL ADMINISTRADOR</h4>
                                    <p> <?php echo $row['Comentario'] ?></p>
                                <?php
                                }
                                ?>

                                <div class="botones">
                                    <?php
                                    $user2 = $row['FK_REPORTER'];
                                    $NewsBtn =  "Select *from user where ID_USER='$user2'";
                                    $NewsBtnSql = $mysqli->query($NewsBtn);
                                    $row14 = mysqli_fetch_assoc($NewsBtnSql);
                                    if ($row14['USER_TYPE'] == "2" && $user2 == $_SESSION["user_id"]) {
                                    ?>
                                        <span> <a style="float:right" class='bx bxs-edit-alt bx-md' href="http://localhost/Frontend/Dashboard/Temp/noticiaValidar_inc.php?idNoticia=<?php echo $idNoticia ?>">Eliminar</a></span>
                                        <span> <a style="float:right" class='bx bxs-edit-alt bx-md' href="http://localhost/Frontend/Dashboard/Temp/noticiaValidar_inc.php?idNoticia=<?php echo $idNoticia ?>">Editar</a></span>
                                    <?php
                                    }
                                    ?>

                                </div>
                            </div>

                            <br><br><br>
                        </div>
                    </section>
                </div>
        <?php
            }
        }
        $categorias = null;
        ?>
        </div>

</body>

</html>