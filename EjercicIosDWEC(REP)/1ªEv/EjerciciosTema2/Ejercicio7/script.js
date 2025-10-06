let n1=prompt("Escribe un Nº");

let n2=prompt("Escriba un segundo Nº");

let n3=prompt("Escriba un tercer numero");

if(!isNaN(n1)&&!isNaN(n2)&&!isNaN(n3)){
    if(n1>n2){
        if(n1>n3){
            document.write(`<h2>El numero ${n1} es mayor que ${n2} y ${n3}</h2>`);
        }else{
            document.write(`<h2>El numero ${n3} es mayor que ${n2} y ${n1}</h2>`)
        }
    }else if(n2>n1){
        if(n2>n3){
            document.write(`<h2>El numero ${n2} es mayor que ${n1} y ${n3}</h2>`)
        }else{
            document.write(`<h2>El numero ${n3} es mayor que ${n2} y ${n1}</h2>`)
        }
    }else if(n1==n2&&n1==n3){
        document.write(`<h2>Los 3 numeros son iguales ${n1}</h2>`)
    }
}else{
    document.write("<h2>Error en la comparacion <br> Uno o mas parametros no es un Numero</h2>");
}