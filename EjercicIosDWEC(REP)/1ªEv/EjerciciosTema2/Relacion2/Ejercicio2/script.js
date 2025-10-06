let alumnos=parseInt(prompt("¿Cuantos alumnos van ha viajar?"));

let total=0;

if(!isNaN(alumnos)){
    if(alumnos>=100){
        total=alumnos*65;
    }else if(alumnos<=99&&alumnos>=50){
        total=alumnos*70;
    }else if(alumnos>=30&&alumnos<=49){
        total=alumnos*95;
    }else if(alumnos<30){
        total=4000;
    }

    if(alumnos<=0){
        alert("No hay gente");
        total=0;
    }else{
        document.write(`Total a pagar por ${alumnos} personas es igual a ${total}€`);
    }
    
}else{
    alert("Debes escribir un Nº ¡Por favior!");
}