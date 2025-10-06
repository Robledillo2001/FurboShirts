let pisos = prompt("¿Cuantos peldaños?");
pisos = parseInt(pisos);
var cadena="";
var espacio="";

if (isNaN(pisos) || pisos <= 0) {
    alert("Escriba un numero positivo!");
}else {
    for (let i =1;i<=pisos*2+1;i++) {
        //Numero de peldaños es igual a la cantidad de or a la escalera
        if(i%2==0){
            if(espacio==""){
                espacio+=" "
            }else{
                espacio+="  ";     
            }
           cadena+=espacio+"|";
        }else{
           cadena+="_\n"
        }
    }
    console.log(cadena);
}

    
 


