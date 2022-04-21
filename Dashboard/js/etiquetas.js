const Selectores = document.getElementById("Selectores");
const SeccionUno = document.getElementById("uno");
const SeccionDos = document.getElementById("dos");
const SeccionTres = document.getElementById("tres");
const addBtn = document.querySelector(".btn-add");
const refresh = document.querySelector(".btn-add2");

const ul = document.querySelector("ul");
var numero=0;

addBtn.addEventListener("click", (e) => {
  e.preventDefault();
  const text = Selectores.value;
  console.log(text);
  if (text !== ""){
    if(numero==2){
      if( text!=SeccionUno.value&&text!=SeccionDos.value){
      SeccionTres.value = text;
      numero=numero+1;
      }
      else{
        alert('Coloque una sección que no se haya puesto antes porfavor');
      }
      }
      if(numero==1){
        if( text!=SeccionUno.value){
        SeccionDos.value = text;
        numero=numero+1;
        }
        else{
          alert('Coloque una sección que no se haya puesto antes porfavor');
        }
      }
  
    if(numero==0){
    
    SeccionUno.value = text;
    numero=numero+1;
      
    
    }

    Selectores.value = "";
    

 
  }
});

refresh.addEventListener("click", (e) => {
  e.preventDefault();
  SeccionUno.value = "VACIO";
  SeccionDos.value= "VACIO";
  SeccionTres.value = "VACIO";
  numero=0;
  }
);





