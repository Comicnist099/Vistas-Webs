<!DOCTYPE html>
<html>
<title>Secciones</title>

<link rel="stylesheet" href="css/secciones_editar.css">
<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">

<link rel="stylesheet" href="css/Nav_Bar.css">
<script src="js/jquery-3.6.0.min.js"></script>

<body style="background-image:  url('./img/bg.jpg'); background-repeat: no-repeat;  background-size: cover;
">
    <script src="js/abrir.js"></script>

    <?php include('./Templates/Nav_Bar.php') ?>
    <header class="header">
        <h3>EDICION DE CATEGORIAS</h3>



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
    <?php
    
    $idTag=$_GET["idTag"];
    ?>

    <form class="form" action="./Temp/secciones_editar_inc.php?idTag=<?php echo $idTag ?>" method="post" enctype="multipart/form-data">
        <div class="cont">
            <div class="categorias_input">
                <h3>Modificar el nombre de categoría:</h3>
                <input name="Nombre" type="text" id="txt">
                <h3>Color:</h3>
                <input type="color" id="colorPicker" value="#6a5acd">
                <input type="text" name="box" id="box">
            </div>
            <div class="btns">
                <button  type="submit"  name="submit"  onclick="addLI()"> Modificar</button>

            </div>
        </div>
    </form>
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
    <script>
        var inputText = document.getElementById("txt"),
            items = document.querySelectorAll("#list li"),
            tab = [],
            index;

        // get the selected li index using array
        // populate array with li values

        for (var i = 0; i < items.length; i++) {
            tab.push(items[i].innerHTML);
        }

        // get li index onclick
        for (var i = 0; i < items.length; i++) {

            items[i].onclick = function() {
                index = tab.indexOf(this.innerHTML);
                console.log(this.innerHTML + " INDEX = " + index);
                // set the selected li value into input text
                inputText.value = this.innerHTML;
            };

        }

        function refreshArray() {
            // clear array
            tab.length = 0;
            items = document.querySelectorAll("#list li");
            // fill array
            for (var i = 0; i < items.length; i++) {
                tab.push(items[i].innerHTML);
            }
        }

        function addLI() {

            var listNode = document.getElementById("list"),
                textNode = document.createTextNode(inputText.value),
                liNode = document.createElement("LI");

            liNode.appendChild(textNode);
            listNode.appendChild(liNode);

            refreshArray();

            // add event to the new LI

            liNode.onclick = function() {
                index = tab.indexOf(liNode.innerHTML);
                console.log(liNode.innerHTML + " INDEX = " + index);
                // set the selected li value into input text
                inputText.value = liNode.innerHTML;
            };

        }

        function editLI() {
            // edit the selected li using input text
            items[index].innerHTML = inputText.value;
            refreshArray();
        }

        function deleteLI() {

            refreshArray();
            if (items.length > 0) {
                items[index].parentNode.removeChild(items[index]);
                inputText.value = "";
            }
        }
    </script>



    <?php include('./Templates/Footer.php') ?>


</body>