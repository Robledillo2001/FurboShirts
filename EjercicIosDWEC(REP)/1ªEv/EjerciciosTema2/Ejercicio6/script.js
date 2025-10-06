let n1=prompt("Escribe un Nº");

let n2=prompt("Escriba un segundo Nº");

if(!isNaN(n1)&&!isNaN(n2)){
    if(n1>n2){
        document.write(`<h2>El Nº ${n1} es mayor que ${n2}</h2>`)
    }else if(n1<n2){
        document.write(`<h2>El Nº ${n2} es mayor que ${n1}</h2>`)
    }else if(n1==n2){
        document.write(`<h2>Los dos numeros son iguales-->${n1}</h2>`)
    }
}else{
    document.write("<h2>Error en la comparacion <br> Uno o mas parametros no es un Numero</h2>")
}