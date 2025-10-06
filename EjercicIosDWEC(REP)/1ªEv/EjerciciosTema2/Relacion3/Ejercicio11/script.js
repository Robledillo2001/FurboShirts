let numero=parseInt(prompt("Elige un numero"));
while(true){
    
    if(numero<0){
        console.log(`El numero ${numero} es negativo`);
    }else if(numero>0){
        console.log(`El numero ${numero} es positivo`);
    }else{
        alert("Bucle Roto");
        break;
    }
    numero=parseInt(prompt("Elige un numero"))
}
console.log("Hasta luego 🔫");