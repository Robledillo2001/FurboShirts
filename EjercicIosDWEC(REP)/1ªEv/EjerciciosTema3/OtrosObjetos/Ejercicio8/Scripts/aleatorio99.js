let number = Math.floor(Math.random() * 99) + 1;
let contador = 0;
let mensaje="";

while (contador <= 12) {
    let num = prompt("¿Qué número es?");
    
    if (num == number) {
        if (contador >= 1 && contador <= 3) {
            mensaje=contador+(" Suertudo");
        } else if (contador >= 4 && contador <= 6) {
            mensaje=(contador+" Genio");
        } else if (contador == 7) {
            mensaje=(contador+" No está mal");
        } else if (contador == 8) {
            mensaje=(contador+" Se puede mejorar");
        } else if (contador >= 9 && contador <= 11) {
            mensaje=(contador+" Que pasa amigo");
        } else if (contador >= 12) {
            mensaje=("12 >Eres un paquete");
        }
        break; // Salir del bucle cuando se adivina el número
    } else if (num > number) {
        alert("El número es menor");
    } else {
        alert("El número es mayor");
    }
    contador++;
}
document.write(mensaje);

