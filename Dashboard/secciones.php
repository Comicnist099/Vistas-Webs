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

    <div class="cont">
        <input type="text" id="txt">
        <div class="btns">
            <button onclick="addLI()">  Añadir</button>
            <button onclick="editLI()">Editar</button>
            <button onclick="deleteLI()">Eliminar</button>
        </div>
        <ul id="list">
            <li>Noticias</li>
            <li>Deportes</li>
            <li>Entretenimiento</li>
        </ul>

    </div>
    </div>

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