let seccion1=document.getElementById("seccion1")
let seccion2=document.getElementById("seccion2")
let seccion3=document.getElementById("seccion3")
let seccion4=document.getElementById("seccion4")

let subseccion1=document.getElementById("subseccion1")
let subseccion2=document.getElementById("subseccion2")
let subseccion3=document.getElementById("subseccion3")
let subseccion4=document.getElementById("subseccion4")

subseccion1.style.display="none";
subseccion2.style.display="none";
subseccion3.style.display="none";
subseccion4.style.display="none";

seccion1.addEventListener("mouseenter",()=>{
    subseccion1.style.display="block";
});

seccion2.addEventListener("mouseenter",()=>{
    subseccion2.style.display="block";
});

seccion3.addEventListener("mouseenter",()=>{
    subseccion3.style.display="block";
});

seccion4.addEventListener("mouseenter",()=>{
    subseccion4.style.display="block";
});

seccion1.addEventListener("mouseleave",()=>{
    subseccion1.style.display="none";
});

seccion2.addEventListener("mouseleave",()=>{
    subseccion2.style.display="none";
});

seccion3.addEventListener("mouseleave",()=>{
    subseccion3.style.display="none";
});

seccion4.addEventListener("mouseleave",()=>{
    subseccion4.style.display="none";
});