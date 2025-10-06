let n1=prompt("Escribe un Nº");

let n2=prompt("Escriba un segundo Nº");

let total=0;

if(!isNaN(n1)&&!isNaN(n2)){
    total=n1+n2;
    document.write(`<h2>La suma de ${n1} y ${n2} es igual a ${total}</h2>`);
}else{
    document.write("<h2>Error en la suma <br> Uno o mas parametros no es un Numero</h2>")
}