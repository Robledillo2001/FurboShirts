let texto=prompt("Escriba un texto").toLowerCase();

let contador=0;
let parte1="";
let parte2="";

let mitad =texto.length%2===0? texto.length/2:(textp.length-1)/2+1;

parte1=texto.slice(0, mitad);
parte2=texto.slice(mitad);

console.log(`Primera parte: ${parte1}`);
console.log(`Segunda parte: ${parte2}`);