// Solicitar dos números al usuario
let numero1 = prompt("Escriba el primer número");
let numero2 = prompt("Escriba el segundo número");

// Verificar si ambas entradas son números válidos y positivos
if (!isNaN(numero1) && !isNaN(numero2) && numero1 > 0 && numero2 > 0) {
    numero1 = Number(numero1); // Convertir a número
    numero2 = Number(numero2); // Convertir a número
    let divisores1 = []; // Arreglo para almacenar los divisores del primer número
    let divisores2 = []; // Arreglo para almacenar los divisores del segundo número

    // Encontrar los divisores del primer número
    for (let i = 1; i <= numero1; i++) {
        if (numero1 % i === 0) {
            divisores1.push(i); // Agregar el divisor al arreglo
        }
    }

    // Encontrar los divisores del segundo número
    for (let i = 1; i <= numero2; i++) {
        if (numero2 % i === 0) {
            divisores2.push(i); // Agregar el divisor al arreglo
        }
    }

    // Encontrar los divisores comunes
    let divisoresComunes = divisores1.filter(divisor => divisores2.includes(divisor));

    // Mostrar los divisores comunes en pantalla
    if (divisoresComunes.length > 0) {
        document.write(`Los divisores comunes de ${numero1} y ${numero2} son: ${divisoresComunes.join(", ")}`);
    } else {
        document.write(`No hay divisores comunes entre ${numero1} y ${numero2}.`);
    }
} else {
    document.write(`Por favor, asegúrese de ingresar números válidos y positivos.`);
}
