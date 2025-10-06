// Expresiones regulares en JavaScript

// Crear una expresión regular con constructor
let regex1 = new RegExp("abc"); // Busca el texto "abc" exacto

// Crear una expresión regular literal
let regex2 = /abc/;

// Usar caracteres normales y especiales
let regex3 = /\d{3}-\d{2}-\d{4}/; // Ejemplo: patrón para número tipo SSN (123-45-6789)

// Comprobar coincidencias
let texto = "Mi número es 123-45-6789";
console.log(regex3.test(texto)); // true

// Problemas con caracteres UNICODE
let textoUnicode = "mañana";

// Esto puede fallar en versiones antiguas de JS:
let regexIncorrecto = /ñ/;
console.log(regexIncorrecto.test(textoUnicode)); // true o false dependiendo del entorno

// Solución ES2018: usar \p y el modificador 'u'
let regexUnicode = /\p{Letter}+/gu; // Coincide con cualquier letra UNICODE
console.log(regexUnicode.test(textoUnicode)); //Aparecera si o si true
