let numero = parseInt(prompt("Elige un número"));

// Verificar si es un número y si es impar
if (isNaN(numero)) {
  alert("No es un número válido");
} else if (numero % 2 === 0) {
  alert("El número no es impar");
} else {
  // Crear pirámide de asteriscos
  for (let i = 1; i <= numero; i += 2) { // i incrementa de 2 en 2 para mantener la forma de la pirámide
    console.log(" ".repeat((numero - i) / 2) + "*".repeat(i));
  }
}
