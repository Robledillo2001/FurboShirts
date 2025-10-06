let numero = parseInt(prompt("Elige un número"));

// Verificar si es un número y si es impar
if (isNaN(numero)) {
  alert("No es un número válido");
} else if (numero % 2 === 0) {
  alert("El número no es impar");
} else {
  // Crear la parte superior del rombo
  for (let i = 1; i <= numero; i += 2) {
    console.log(" ".repeat((numero - i) / 2) + "*".repeat(i));
  }

  // Crear la parte inferior del rombo
  for (let i = numero - 2; i >= 1; i -= 2) {
    console.log(" ".repeat((numero - i) / 2) + "*".repeat(i));
  }
}
