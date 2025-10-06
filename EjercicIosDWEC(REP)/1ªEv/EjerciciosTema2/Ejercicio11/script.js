let frase=prompt("Escriba cualquier TEXT0");
let contador=0;

for(let i=0;i<frase.length;i++){
    let vocales="aeiouAEIOU";
    if(vocales.includes(frase[i])){
        contador++;
    }
}
if(contador>0){
    console.log(`${frase}`)
    if(contador==1){
        console.log(`La frase contiene ${contador} vocal`);
    }else{
        console.log(`La frase contiene ${contador} vocales`);
    }
}else{
    console.log(`La frase no contiene ninguna vocal`);
}