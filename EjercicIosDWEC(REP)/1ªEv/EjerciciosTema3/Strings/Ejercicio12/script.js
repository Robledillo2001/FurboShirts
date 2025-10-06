let frase = prompt("Escriba una frase");

let palabras=frase.split(" ");
let contador=0;

for(let i=0;i<palabras.length;i++){
    if(palabras!=" "){
        contador++
    }
}
console.log(`${frase} contiene ${contador} palabras`)
