const texto=prompt("Escriba un texto");

const textoNuevo=texto.replace(/\s+/g, '');

console.log(`Texto sin espacios\n${textoNuevo}`);