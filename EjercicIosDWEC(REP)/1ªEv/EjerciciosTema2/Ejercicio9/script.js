let frase=prompt("Escriba cualquie TEXT0");
let contador=0;

for(let i=0;i<frase.toLowerCase().length;i++){
    if(frase[i].includes("a")){
        contador++;
    }
}
if(contador>0){
    console.log(`${frase}`)
    console.log(`La frase contiene ${contador} a`);
}else{
    console.log(`La frase no contiene ninguna a`);
}