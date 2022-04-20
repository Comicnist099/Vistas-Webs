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
      if( text!=SeccionUno.textContent&&text!=SeccionDos.textContent){
      SeccionTres.textContent = text;
      numero=numero+1;
      }
      else{
        alert('Coloque una sección que no se haya puesto antes porfavor');
      }
      }
      if(numero==1){
        if( text!=SeccionUno.textContent){
        SeccionDos.textContent = text;
        numero=numero+1;
        }
        else{
          alert('Coloque una sección que no se haya puesto antes porfavor');
        }
      }
  
    if(numero==0){
    
    SeccionUno.textContent = text;
    numero=numero+1;
      
    
    }

    Selectores.value = "";
    

 
  }
});

refresh.addEventListener("click", (e) => {
  e.preventDefault();
  SeccionUno.textContent = "VACIO";
  SeccionDos.textContent = "VACIO";
  SeccionTres.textContent = "VACIO";
  numero=0;
  }
);





