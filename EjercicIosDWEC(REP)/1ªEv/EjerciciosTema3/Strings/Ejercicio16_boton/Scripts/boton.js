//let texto=prompt("Escriba una cadena");
let texto=document.getElementById("entrada");
let contador=0;
let boton=document.getElementById("boton");
let cambiarTitulo=function(){
    if(contador<=20){
        let contenido = texto.value;
        texto.value = contenido.substring(1) + contenido[0];
        document.title = texto.value;
    }
    contador++;
}
let intervalo=function(){
    setInterval(cambiarTitulo,200); 
}

boton.addEventListener("click", intervalo);