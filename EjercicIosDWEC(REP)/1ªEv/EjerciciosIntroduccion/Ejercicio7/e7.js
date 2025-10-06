var mensaje = "salvoconducto"; // Variable mensaje definida correctamente

// Función para cambiar el texto del párrafo
function cambiarTexto() {
    var parrafo = document.getElementById("parrafo");
    parrafo.innerHTML = "El texto cambió"; // Texto corregido
}

// Ejecutar la función cambiarTexto una vez que la página esté completamente cargada
window.onload = function() {
    cambiarTexto();
};
