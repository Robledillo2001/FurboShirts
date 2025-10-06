let cadena="";


for(let i=0;i<10;i++){
    cadena+=" |";
    for(let j=0;j<10;j++){
        cadena+="\n";
    }
}
document.write(cadena);


/*
    let pisos = prompt("¿Cuántos peldaños?");
    pisos = parseInt(pisos);
    var cadena = "";
    var espacio = "";

    if (isNaN(pisos) || pisos <= 0) {
        alert("Escriba un número positivo!");
    } else {
        for (let i = pisos; i >= 1; i--) {
            // Añadir espacios a la izquierda para alinear la escalera
            espacio = " ".repeat(pisos - i);
            cadena += espacio + "|_\n"; // Agregar el peldaño
        }
        console.log(cadena);
}

*/