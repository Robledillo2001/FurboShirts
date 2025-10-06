let numero=1

while(numero>0){
    numero=parseInt(prompt("Elige un numero"))
    if(numero<=0){
        alert("El bucle se rompio");
        break;
    }else{
        console.log(`El cubo de ${numero} es de ${Math.pow(numero,3)}\n`);   
    }
}
console.log("Hasta luego 🔫");