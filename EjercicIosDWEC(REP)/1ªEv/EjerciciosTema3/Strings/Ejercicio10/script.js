// Pedimos la cadena principal y la subcadena al usuario
let cadena = prompt("Ingresa una cadena");
let subcadena = prompt("Ingresa una segunda cadena");

// Verificamos si la cadena comienza con la subcadena
if (cadena.startsWith(subcadena)) {
    console.log(`La cadena "${cadena}" comienza con la subcadena "${subcadena}".`);
} else {
    console.log(`La cadena "${cadena}" no comienza con la subcadena "${subcadena}".`);
}
