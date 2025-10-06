let imagenVisor=document.getElementById("ImagenVisor");
let titulo=document.getElementById("titulo");

let imagen1=document.getElementById("Imagen1")
let imagen2=document.getElementById("Imagen2")
let imagen3=document.getElementById("Imagen3")
let imagen4=document.getElementById("Imagen4")
let imagen5=document.getElementById("Imagen5")
let imagen6=document.getElementById("Imagen6")
let imagen7=document.getElementById("Imagen7")
let imagen8=document.getElementById("Imagen8")


imagen1.addEventListener("click",()=>{
    imagenVisor.src="imagenesEjercicio7/foto1.jpg";
    titulo.textContent=imagen1.alt
});

imagen2.addEventListener("click",()=>{
    imagenVisor.src="imagenesEjercicio7/foto2.jpg";
    titulo.textContent=imagen2.alt
});

imagen3.addEventListener("click",()=>{
    imagenVisor.src="imagenesEjercicio7/foto3.jpg";
    titulo.textContent=imagen3.alt
});

imagen4.addEventListener("click",()=>{
    imagenVisor.src="imagenesEjercicio7/foto4.jpg";
    titulo.textContent=imagen4.alt
});

imagen5.addEventListener("click",()=>{
    imagenVisor.src="imagenesEjercicio7/foto5.jpg";
    titulo.textContent=imagen5.alt
});

imagen6.addEventListener("click",()=>{
    imagenVisor.src="imagenesEjercicio7/foto6.jpg";
    titulo.textContent=imagen6.alt
});

imagen7.addEventListener("click",()=>{
    imagenVisor.src="imagenesEjercicio7/foto7.jpg";
    titulo.textContent=imagen7.alt
});

imagen8.addEventListener("click",()=>{
    imagenVisor.src="imagenesEjercicio7/foto8.jpg";
    titulo.textContent=imagen8.alt
});