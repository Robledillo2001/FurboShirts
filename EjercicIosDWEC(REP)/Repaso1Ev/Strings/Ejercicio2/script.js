let cadena = prompt("Escribe una cadena");

let numero;

// Validar que el número ingresado sea mayor que 0
while (numero <= 0 || isNaN(numero)) {
    numero = parseInt(prompt("Escribe un número mayor que 0"));
    if (numero <= 0 || isNaN(numero)) {
        alert("Escribe un número válido mayor que 0");
    }
}

// Crear una cadena de puntos
let cadenaPuntos = ".".repeat(numero);

let cadenaFinal = "";
// Añadir los puntos entre los caracteres de la cadena
for (let i = 0; i < cadena.length; i++) {
    cadenaFinal += cadena[i];
    if (i < cadena.length - 1) {
        cadenaFinal += cadenaPuntos; // No añadir puntos al final de la cadena
    }
}

alert("Cadena con puntos: " + cadenaFinal);

// Mostrar la cadena con puntos en el título
document.title = cadenaFinal;

let fechaInicial = new Date();

// Eliminar puntos progresivamente
const intervalo = setInterval(() => {

    let fechaFinal = new Date();
    let tiempo = fechaFinal.getTime() - fechaInicial.getTime();
    let minutos = Math.floor(tiempo / (1000 * 60));
    let segundos = Math.floor((tiempo / 1000) % 60);
    // Encontrar el primer punto en la cadena
    let indicePunto = cadenaFinal.indexOf(".");
    
    if (indicePunto === -1) {
        // Si no hay más puntos, detener el intervalo
        clearInterval(intervalo);
        alert(`Ya no hay puntos.\nTiempo total: ${minutos} minutos y ${segundos} segundos`);
        return;
    }

    // Eliminar el primer punto encontrado
    cadenaFinal = cadenaFinal.slice(0, indicePunto) + cadenaFinal.slice(indicePunto + 1);

    // Actualizar el título con la cadena modificada
    document.title = cadenaFinal;
}, 100);
