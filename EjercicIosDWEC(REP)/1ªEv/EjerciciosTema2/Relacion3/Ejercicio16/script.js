let numero = parseInt(prompt("Escribe un número de tres cifras"));

if (numero >= 100 && numero <= 999) { // Verificar si el número tiene tres cifras
  let resultado = 0;
  let numString = numero.toString(); // Convertir el número a string

  for (let i = 0; i < numString.length; i++) {
    resultado += parseInt(numString[i]); // Sumar cada dígito convertido a entero
  }

  console.log(`Las tres cifras de ${numero} dan ${resultado}`);
} else {
  console.log("NO tiene tres cifras");
}
