let empleadoSueldo=40000;
let añosTrabajo=parseInt(prompt("¿Cuantos años lleva Fulanita en la empresa?"));
let cantidadAumento=0;

if(!isNaN(añosTrabajo)){
    if(añosTrabajo>=10){
        cantidadAumento=empleadoSueldo*0.10;
        empleadoSueldo+=cantidadAumento;
    }else if(añosTrabajo<10&&añosTrabajo>=5){
        cantidadAumento=empleadoSueldo*0.07;
        empleadoSueldo+=cantidadAumento;
    }else if(añosTrabajo<5&&añosTrabajo>=3){
        cantidadAumento=empleadoSueldo*0.05;
        empleadoSueldo+=cantidadAumento;
    }else if(añosTrabajo<3){
        cantidadAumento=empleadoSueldo*0.03;
        empleadoSueldo+=cantidadAumento;
    }

    document.write(`Fulanito cobraba 40000<br>Ahora cobrara ${empleadoSueldo}€ con un aumento de ${cantidadAumento}`);
}else{
    alert("Debes escribir un Nº ¡Por favor!");
}