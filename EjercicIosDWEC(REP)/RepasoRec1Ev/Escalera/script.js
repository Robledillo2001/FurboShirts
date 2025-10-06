let numero;

while(isNaN(numero)){
    numero = prompt("Escribe un nº");
    if(isNaN(numero)){
        alert("No es un numero escriba otra vez");
    }
}
let escalera="";
let espacio="";
for(let i=1;i<=numero*2+1;i++){
    if(i%2==0){
        if(espacio==""){
            espacio+=" "
        }else{
            espacio+="  ";     
        }
       escalera+=espacio+"|";
    }else{
        escalera+="_\n"
    }
    
}
console.log(escalera);
