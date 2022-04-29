const Selectores = document.getElementById("Selectores");
const SeccionUno = document.getElementById("uno");
const SeccionDos = document.getElementById("dos");
const SeccionTres = document.getElementById("tres");
const addBtn = document.querySelector(".btn-add");
const refresh = document.querySelector(".btn-add2");
const Trash1 = document.querySelector(".btn-add3");
const Trash2 = document.querySelector(".btn-add4");
const Trash3 = document.querySelector(".btn-add5");


const ul = document.querySelector("ul");
var numero = 0;

Trash1.addEventListener("click", (e) => {
  e.preventDefault();
  SeccionUno.value = "VACIO";
});
Trash2.addEventListener("click", (e) => {
  e.preventDefault();
  SeccionDos.value = "VACIO";
});

Trash3.addEventListener("click", (e) => {
  e.preventDefault();

  SeccionTres.value = "VACIO";
});

addBtn.addEventListener("click", (e) => {
  e.preventDefault();
  const text = Selectores.value;
  console.log(text);
  if (text !== "") {

    if (SeccionUno.value == "VACIO") {
      if (text != SeccionTres.value && text != SeccionDos.value) {
      SeccionUno.value = text;
      }else {
        alert('Coloque una sección que no se haya puesto antes porfavor');
      }
    } else {

      if (SeccionDos.value == "VACIO") {
        if (text != SeccionUno.value && text != SeccionTres.value ) {
          SeccionDos.value = text;

        } else {
          alert('Coloque una sección que no se haya puesto antes porfavor');
        }
      } else {
        if (SeccionTres.value == "VACIO") {
          console.log("HOLA");

          if (text != SeccionUno.value && text != SeccionDos.value) {
            SeccionTres.value = text;
            console.log("a");
          } else {
            alert('Coloque una sección que no se haya puesto antes porfavor');
          }
        }
      }
    }
    Selectores.value = "";



  }
});

refresh.addEventListener("click", (e) => {
  e.preventDefault();
  SeccionUno.value = "VACIO";
  SeccionDos.value = "VACIO";
  SeccionTres.value = "VACIO";
  numero = 0;
});