let button = document.getElementById("button");
let fecha = new Date();
let tiempoInicio=fecha.getTime();
let nombreInput = document.getElementById("entrada1");
let apel1Input = document.getElementById("entrada2");
let apel2Input = document.getElementById("entrada3");
let salida=document.getElementById("salida");
let resultado="";

    let miFuncion = function () {
        if (tiempoInicio == 0) {
            tiempoInicio = new Date().getTime();
        } else {
            let tiempoFin = new Date().getTime();
            let diferencia = (tiempoFin - tiempoInicio);
            let segundos=parseInt(diferencia/1000);

            let nombre = nombreInput.value;
            let apel1 = apel1Input.value;
            let apel2 = apel2Input.value;

            resultado = `En introducir a ${nombre} ${apel1} ${apel2} ha tardado ${segundos.toFixed(2)}segundos.`;
            salida.textContent=resultado;

            tiempoInicio = 0;
            }
    }

    let miFuncion2 = function(){
        let Intervalo=setInterval(miFuncion,2000)
    }
button.addEventListener("click", miFuncion2);