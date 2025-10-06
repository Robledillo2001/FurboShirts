let personas = []; // Array multidimensional

while (true) {
    let persona = prompt("Escriba un nombre (escriba 'fin' para terminar)");

    if (persona === "fin") {
        break; // Termina el bucle si se ingresa "fin"
    }

    personas.push([persona, persona.length]); // Agrega un array [nombre, longitud] al array principal
}

// Mostrar los resultados en la página
document.write("<h2>Lista de Nombres y sus Longitudes:</h2>");
for (let i = 0; i < personas.length; i++) {
    // Accedemos a los valores de cada sub-array (nombre y longitud)
    document.write(`<p>Nombre: ${personas[i][0]}, Longitud: ${personas[i][1]}</p>`);
}
