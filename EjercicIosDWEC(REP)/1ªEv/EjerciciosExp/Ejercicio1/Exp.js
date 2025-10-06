//Ejercicio 1
let palabra="Parra tenia una perra";

let exp=/^Parra/;

console.log("Ejercicio 1: "+exp.test(palabra));
//Ejercicio 2
palabra="la parra del patio";

exp=/parra/i;

console.log("Ejercicio 2: "+exp.test(palabra));
//Ejercicio 3
palabra="Tres tristes tigres";

exp=/s$/;

console.log("Ejercicio 3: "+exp.test(palabra));
//Ejercicio 4
palabra="otro podador que por allí pasaba";

exp=/^[op].*q/;

console.log("Ejercicio 4: "+exp.test(palabra));
//Ejercicio 5
palabra="pero la perra de Parra";

exp=/\bp[a-z]*r+a\b/;

console.log("Ejercicio 5: "+exp.test(palabra));
//Ejercicio 6
palabra="pero la perra de Parra.";

exp=/[.]$/;

console.log("Ejercicio 6: "+exp.test(palabra));
//Ejercicio 7
palabra="pero la tigresa de Parra.";

exp=/perr[oa]|tigr[esa]/;

console.log("Ejercicio 7: "+exp.test(palabra));
//Ejercicio 8
palabra="Atajando llego antes";

exp=/^\w*t\w\S/i;

console.log("Ejercicio 8: "+exp.test(palabra));
//Ejercicio 9
palabra="Atajando llego antes";

exp=/^[aeiou]/i;

console.log("Ejercicio 9: "+exp.test(palabra));
//Ejercicio 10
palabra="Pajando llego antes.";

exp=/^[tp].*\.$/i;

console.log("Ejercicio 10: "+exp.test(palabra));
//Ejercicio 11
palabra="Tajando llego antes";

exp=/^[tp]|.*\.$/i;

console.log("Ejercicio 11: "+exp.test(palabra));
//Ejercicio 12
palabra="¿Tajando llego antes?";

exp=/[¿?,.]/i;

console.log("Ejercicio 12: "+exp.test(palabra));
//Ejercicio 13
palabra="Fui a casa en moto";

exp=/casa.*moto/i;

console.log("Ejercicio 13: "+exp.test(palabra));
//Ejercicio 14
palabra="Se estropeo la moto antes de llegar a casa";

exp=/casa.*moto|moto.*casa/i;

console.log("Ejercicio 14: "+exp.test(palabra));
//Ejercicio 15
palabra="Estoy en casa";

exp=/casa|moto/i;

console.log("Ejercicio 15: "+exp.test(palabra));
//Ejercicio 16
palabra="Esto es una cogía";

exp=/\w{3}ía$/i;

console.log("Ejercicio 16: "+exp.test(palabra));