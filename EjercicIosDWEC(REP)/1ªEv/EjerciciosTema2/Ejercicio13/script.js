let numero=prompt("Escriba un Nº");

if(!isNaN(numero)){
    numero = Number(numero); // Convertir a número para poder hacer las operaciones
    if (numero % 2 == 0) {
        document.write(`${numero} es divisible por 2 y el resultado es ${numero / 2}`);
    } else if (numero % 3 == 0) {
        document.write(`${numero} es divisible por 3 y el resultado es ${numero / 3}`);
    } else if (numero % 5 == 0) {
        document.write(`${numero} es divisible por 5 y el resultado es ${numero / 5}`);
    } else {
        document.write(`${numero} no es divisible ni por 2, ni por 3, ni por 5`);
    }
}else{
    document.write(`${numero} no es un numero`);
}
