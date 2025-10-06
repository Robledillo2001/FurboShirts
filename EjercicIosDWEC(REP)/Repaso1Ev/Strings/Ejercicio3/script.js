let cadena = prompt("Escriba una cadena");
let cadenaFinal=cadena.split("");
let letras="";

let fechaInicio=new Date();

let intervalo=setInterval(()=>{
    let fechaFinal=new Date()
    let tiempoTotal=fechaFinal.getTime()-fechaInicio.getTime()

    let minutos = Math.floor(tiempoTotal / (1000 * 60)); // Calcular minutos
    let segundos = Math.floor((tiempoTotal / 1000) % 60); // Calcular segundos

    if(segundos>1){
        if(segundos>=2&&segundos<=15){
            if(cadenaFinal.length>0){
                letras+=cadenaFinal.shift();
            }else{
                clearInterval(intervalo);
                alert("Ya no hay letras")
            }
        }else{
            clearInterval(intervalo);
            alert(`Tiempo de espera agotado letras totales: ${cadenaFinal}`);
        }
    }
    console.log(`${minutos}:${segundos}`)
    document.title=letras;
},1000);