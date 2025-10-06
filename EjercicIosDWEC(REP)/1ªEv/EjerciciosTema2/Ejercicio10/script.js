let frase=prompt("Escriba cualquier TEXT0");
let letras=[];
let contador=0;

for(let i=0;i<frase.length;i++){
    let vocales="aeiouAEIOU";
    if(vocales.includes(frase[i])){
        letras.push(frase[i]);
        contador++;
    }
}
if(contador>0){
    console.log(`${frase}`);
    console.log("La frase contiene las siguientes vocales");
   for(let i of letras){
        console.log(`${i}`)
   } 
   
}else{
    console.log(`La frase no contiene ninguna vocal`);
}