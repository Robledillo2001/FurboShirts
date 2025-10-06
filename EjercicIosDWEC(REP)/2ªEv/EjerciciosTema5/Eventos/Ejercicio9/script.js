let fotoActual = document.getElementById("fotoActual").querySelector("img");
let play = document.getElementById("play");
let mititulo = document.getElementById("mititulo");

// Array de imágenes (puedes agregar más imágenes si lo deseas)
let imagenes = [
    "imagenesEjercicio7/foto1.jpg",
    "imagenesEjercicio7/foto2.jpg",
    "imagenesEjercicio7/foto3.jpg",
    "imagenesEjercicio7/foto4.jpg",
    "imagenesEjercicio7/foto5.jpg",
    "imagenesEjercicio7/foto6.jpg",
    "imagenesEjercicio7/foto7.jpg",
    "imagenesEjercicio7/foto8.jpg"
];

// Variable para mantener el índice actual
let indice = 0;

// Evento para el botón "Play"
play.addEventListener("click", iniciarCambioImagenes);

// Función para iniciar el cambio automático de imágenes cada 3 segundos
function iniciarCambioImagenes() {
    setInterval(MostrarAleatoria, 3000);
}

// Función que muestra una imagen aleatoria
function MostrarAleatoria() {
    // Genera un número aleatorio para seleccionar una imagen del array
    indice = Math.floor(Math.random() * imagenes.length); 

    // Cambia la imagen y el título
    fotoActual.src = imagenes[indice];
    mititulo.textContent = `Imagen ${indice + 1}`;
}
