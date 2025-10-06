let numero=parseFloat(prompt("Escribe un nª"));

if(!isNaN(numero)){
    if(numero%2==0){
        document.write(`<h2>${numero} es divisible entre 2</h2>`);
    }else{
        document.write(`<h2>${numero} no es divisible entre 2</h2>`);
    }
}else{
    document.write(`<h2> El numero escrito no es un numero`);
}