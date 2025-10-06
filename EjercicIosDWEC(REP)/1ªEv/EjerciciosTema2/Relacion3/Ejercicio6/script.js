let numero1 = parseInt(prompt("Primer numero"));
let numero2 = parseInt(prompt("Segundo numero"));

if (numero1 > numero2) {
    for (let i = numero2; i <= numero1; i++) {
        console.log(i);
    }
} else if (numero2 > numero1) {
    for (let i = numero1; i <= numero2; i++) {
        console.log(i);
    }
}else {
    console.log("Los números son iguales.");
}
