let texto=prompt("Escriba un texto").toLowerCase();

let vocales="aeiou";
let contador=0;

for(let i=0;i<texto.length;i++){
    if(vocales.includes(texto[i])){
        contador++;
    }
}
console.log(`El texto ${texto} contiene ${contador} vocales`);