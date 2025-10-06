let frase = prompt("Escriba cualquier texto").toLowerCase();
let contadorVocales = {
    a: 0,
    e: 0,
    i: 0,
    o: 0,
    u: 0
};

// Recorremos cada letra de la frase
for (let letra of frase) {
    // Verificamos si la letra es una vocal
    if (letra in contadorVocales) {
        contadorVocales[letra]++;
    }
}

// Mostramos los resultados
for (let vocal in contadorVocales) {
    console.log(`La vocal ${vocal} aparece ${contadorVocales[vocal]} veces`);
}
