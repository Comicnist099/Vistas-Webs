const Fecha1 = document.getElementById("start");
const Fecha2 = document.getElementById("medio");
const Pie1 = document.getElementById("Pie1");
const Pie2 = document.getElementById("Pie2");
const Pie3 = document.getElementById("Pie3");

const FiltrarAvanzado = document.querySelector(".FiltrarAvanzado");



const Letras1 = document.getElementById("Letras1");


const combo1 = document.getElementById("combo1");
const combo2 = document.getElementById("combo2");
const combo3 = document.getElementById("combo3");


const Avanzado = document.querySelector(".btn-Avanzado");

var flag=true;
Avanzado.addEventListener("click", (e) => {
  e.preventDefault();

  console.log("HOLA")
  if(flag){
  Fecha1.style.display = "none";
  combo1.style.display = "none";
  combo2.style.display = "none";
  combo3.style.display = "none";
  Letras1.style.display = "none";
  Fecha2.style.display="none"
  Pie1.style.display = "none";
  Pie2.style.display = "none";
  FiltrarAvanzado.style.display="none";
  Pie3.style.display = "none";
  flag=false;
  }
  else{
    FiltrarAvanzado.style.display="inline";
    Fecha1.style.display = "inline";
    combo1.style.display = "inline";
    combo2.style.display = "inline";
    combo3.style.display = "inline";
  
    Letras1.style.display = "inline";
    Fecha2.style.display="inline"
    Pie1.style.display = "inline";
    Pie2.style.display = "inline";
    Pie3.style.display = "inline";
    flag=true;
  }

});