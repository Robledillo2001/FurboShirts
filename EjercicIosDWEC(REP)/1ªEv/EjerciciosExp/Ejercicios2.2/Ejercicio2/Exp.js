let nif = prompt("Escriba un NIF").toUpperCase().trim();

function ValidarNif(NIF){
    let validacion=/^(X|Y|Z|[0-9])?\d{7}[TRWAGMYFPDXBNJZSQVHLCKE]$/;
    return validacion.test(NIF);
}
letras="TRWAGMYFPDXBNJZSQVHLCKE"
let numero;

if(nif[0]=='X'){
    numero='0'+nif.slice(1,-1);
}else if(nif[0]=='Y'){
    numero='1'+nif.slice(1,-1);
}else if(nif[0]=='Z'){
    numero='2'+nif.slice(1,-1);
}

// Calcular la letra correspondiente
let resto = parseInt(numero, 10) % 23;
let letraCalculada = letras[resto];

numero+=letraCalculada;
nif=numero;

if(ValidarNif(numero)){
    alert(`El nif ${nif} es correcto`);
}else{
    alert(`El nif ${nif} no es correcto`);
}