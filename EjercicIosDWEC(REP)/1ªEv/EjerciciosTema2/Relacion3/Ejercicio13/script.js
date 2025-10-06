let numero=parseInt(prompt("Escriba un numero"));
let contador=0;

while(numero<=0){
    if(numero>0){
        alert("Bucle roto")
        break;
    }
    contador++;
    console.log(`${numero} es mayor a 0`);
    numero=parseInt(prompt("Escriba un numero"));

}
console.log(`Numeros negativos:${contador}\nADIOS!`);