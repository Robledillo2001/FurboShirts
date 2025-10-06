let capa=document.getElementById("capa");

let boton=document.getElementById("boton")

let cerrar=document.getElementById("cerrar")

capa.addEventListener("scroll",()=>{
    if (capa.scrollHeight - capa.scrollTop === capa.clientHeight) {
        boton.style.display = "block"; // Mostrar el botón
    }
});

cerrar.addEventListener("click",()=>{
    capa.style.display="none";
});