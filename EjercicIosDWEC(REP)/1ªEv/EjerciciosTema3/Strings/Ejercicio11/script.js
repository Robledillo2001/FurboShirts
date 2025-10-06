let cadena=prompt("Escriba una frase");

let caracter=prompt("Escriba un caracter");

let contador=0;
if(caracter.length!=1){
    alert("Hay mas de un caracter");
}else{
    for(let i=0;i<cadena.length;i++){
        if(caracter.includes(cadena[i])){
            contador++;
        }
    }
    console.log(`El caracter ${caracter} aparece ${contador} veces`);
}
