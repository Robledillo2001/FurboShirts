let texto=prompt("Escriba una cadena");
let contador=0;
let cambiarTitulo=function(){
    if(contador<=20){
        texto=texto[texto.length-1]+texto.substring(0,texto.length-1);
        console.clear();
        console.log(texto);
        document.title = texto;
    }
    contador++;
}
setInterval(cambiarTitulo,200);
