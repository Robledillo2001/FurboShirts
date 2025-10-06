let cadena=prompt("Escriba cadena");
let letra1=prompt("Escriba una letra");
let letra2=prompt("Escriba otra letra");

if(letra1.length!=1||letra2.length!=1){
    alert("Escriba una letra");
}else{
    alert(cadena.replace(letra1,letra2));
}