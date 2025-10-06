let numero=parseInt(prompt("Elige un numero"))
let resultado=0;
if(numero>0){
    for(let i=1;i<=numero;i++){
        console.log(`${i}+${resultado}`);
        resultado+=i;
        console.log(`${resultado}`)
    }
}else{
    console.log("Se debe escribir un numero mayor a 0");
}
