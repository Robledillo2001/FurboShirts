const texto=prompt("Ingrese un texto:");
const limpio =texto.replace(/\s+/g, '').toLowerCase();

const invertido=limpio.split('').reverse().join('');
console.log(texto);
if(limpio===invertido){
    console.log("Es capicua");
}else{
    console.log("No es capicua");
}