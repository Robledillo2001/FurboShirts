let texto=prompt("Escriba una cadena");
let contador=0;
let cambiarTitulo=function(){
    if(contador<=20){
        texto=texto.substring(1)+texto[0];
        /*console.clear();
        console.log(texto);*/
        document.title = texto;
    }
    contador++;
}
setInterval(cambiarTitulo,200);
