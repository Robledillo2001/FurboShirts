window.addEventListener("DOMContentLoaded", function () {
    document.getElementById("abrir").addEventListener("click",()=>{
        document.getElementById("sidebar").style.width="250px";
        document.getElementById("contenido").style.marginLeft="250px";
        document.getElementById("abrir").style.display="none";
        document.getElementById("cerrar").style.display="block";
    });

    document.getElementById("cerrar").addEventListener("click",()=>{
        document.getElementById("sidebar").style.width="0px";
        document.getElementById("contenido").style.marginLeft="0px";
        document.getElementById("abrir").style.display="block";
        document.getElementById("cerrar").style.display="none";
    });
});