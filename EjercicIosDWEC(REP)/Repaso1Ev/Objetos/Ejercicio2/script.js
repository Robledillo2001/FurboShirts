//Declaracion de Objetos Boletos
function Boletos() {
    this.numeros = []; // Array de números

    // Añadimos 6 números únicos
    while (this.numeros.length < 6) {
        let aleatorio = Math.floor(Math.random() * 49) + 1;
        if (!this.numeros.includes(aleatorio)) { // Si no está en el array
            this.numeros.push(aleatorio); // Lo añadimos
        }
    }
}

Boletos.prototype.Iguales = function (boleto) {
    // Ordenamos los números de los boletos
    this.numeros.sort((a, b) => a - b);
    boleto.numeros.sort((a, b) => a - b);

    // Comparamos los números
    for (let i = 0; i < this.numeros.length; i++) {
        if (this.numeros[i] !== boleto.numeros[i]) {
            return false; // Si no son iguales, devolvemos false
        }
    }
    return true; // Si todos son iguales, devolvemos true
};

function SecuenciaBoletos() {
    this.boletos = []; // Array de boletos

    // Generamos 100 boletos
    for (let i = 0; i < 100; i++) {
        this.boletos.push(new Boletos());
    }
}

SecuenciaBoletos.prototype.Mostrar = function () {
    let resultado = "";
    for (let i = 0; i < this.boletos.length; i++) {
        resultado += `${this.boletos[i].numeros.join(", ")}<br>`;
    }
    return resultado;
};

// Crear instancia de SecuenciaBoletos
let boletos = new SecuenciaBoletos();

// Muestra los boletos en la página web
document.write(boletos.Mostrar());

// Acceder a los dos primeros boletos para compararlos
let boleto1 = boletos.boletos[0]; // Primer boleto de la secuencia
let boleto2 = boletos.boletos[1]; // Segundo boleto de la secuencia

// Comparar los boletos
console.log(boleto1.Iguales(boleto2)); // Devuelve true si son iguales, false si no lo son
