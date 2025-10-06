function validadarFecha(fecha){
    let validacion=/^\d{2}\/\d{2}\/\d{4}/;

    return validacion.test(fecha);
}

function pedirFecha(){
    let fecha
    let validar=false;
    
    while(!validar){
        fecha=prompt("Escribe una fecha correctamente");
        if(validadarFecha(fecha)){
            validar=true;
        }else{
            alert("Formato incorrecto. Escriba otra vez la fecha")
        }
    }
    return fecha;
}

let fecha1=pedirFecha();
let fecha2=pedirFecha();
function diferenciaFechas(){
    let milisegundosDia=Math.abs(fechaDate1.getTime()-fechaDate2.getTime())
    let dias=milisegundosDia/1000/60/60/24;
    return dias;
}

function ConvertirFecha(fecha){
    let fechaNormal=fecha.split("/")
    return new Date(fechaNormal[2],fechaNormal[1],fechaNormal[0]);
}

let fechaDate1=ConvertirFecha(fecha1);
let fechaDate2=ConvertirFecha(fecha2);

alert(`La diferencia del dia ${fecha1} y el dia ${fecha2} es de ${diferenciaFechas()} dias`)
