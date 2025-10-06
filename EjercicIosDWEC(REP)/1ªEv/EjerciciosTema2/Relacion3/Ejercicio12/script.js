let numero=parseInt(prompt("Escriba un numero"));

while(numero!=0){
    if(numero==0){
        alert("Bucle roto")
        break;
    }

    console.log(`${numero} es distinto a 0`);
    numero=parseInt(prompt("Escriba un numero"));
}
console.log("ADIOS!");