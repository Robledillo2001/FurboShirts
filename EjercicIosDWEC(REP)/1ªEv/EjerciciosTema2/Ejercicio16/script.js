// Solicitar un número al usuario
let numero = prompt("Escriba un número");

// Verificar si la entrada es un número
if (!isNaN(numero) && numero > 0) {
    numero = Number(numero); // Convertir a número para poder hacer las operaciones
    let divisores = []; // Arreglo para almacenar los divisores

    // Encontrar los divisores del número
    for (let i = 1; i <= numero; i++) {
        if (numero % i === 0) {
            divisores.push(i); // Agregar el divisor al arreglo
        }
    }

    // Mostrar los divisores en pantalla
    document.write(`Los divisores de ${numero} son: ${divisores.join(", ")}`);
} else {
    document.write(`${numero} no es un número válido. Asegúrese de ingresar un número positivo.`);
}
