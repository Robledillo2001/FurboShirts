let personas = [];
let longitudes = [];

while (true) {
    let persona = prompt("Escriba un nombre (escriba 'fin' para terminar)").toUpperCase();

    if (persona === "FIN") {
        break; // Termina el bucle si la palabra es 'fin'
    }

    personas.push(persona);           // Agrega el nombre al array de personas
    longitudes.push(persona.length);  // Agrega la longitud del nombre al array de longitudes
}

// Mostrar los resultados en la página
document.write("<h2>Lista de Nombres y sus Longitudes:</h2>");
for (let i = 0; i < personas.length; i++) {
    document.write(`<p>Nombre: ${personas[i]}, Longitud: ${longitudes[i]}</p>`);
}
