//Expresione regulares
/*Ejercicio 1*/
let exp=/^\D/
let frase="Un conejo";

console.log(exp.test(frase));

frase="1 conejo";

console.log(exp.test(frase));

/*Ejercicio 2*/
exp=/\bjava\b/
frase="Estudiando java";

console.log(exp.test(frase));

frase="Estudiando javastreet";

console.log(exp.test(frase));

/*Ejercicio 3*/
exp=/^\/.+\|$/
frase="/path/to/resource|";

console.log(exp.test(frase));

frase="coca";

console.log(exp.test(frase));

/*Ejercicio 4*/
exp=/^[357]0\D{7}$/
frase="30ABCDEFG";

console.log(exp.test(frase));

frase="30Street";

console.log(exp.test(frase));

/*Ejercicio 5*/
exp=/inteligencia|artificial/i
frase="Usando la inteligencia artificial";

console.log(exp.test(frase));

frase="Usando chat GPT";

console.log(exp.test(frase));