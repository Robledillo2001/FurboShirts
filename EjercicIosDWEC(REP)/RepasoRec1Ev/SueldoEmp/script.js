//Forma procedimental
let sueldo=40000;
let anos=prompt("Escribe los anos que lleva trabajados");
let porcentaje=0;

if(anos>=10){
    porcentaje=sueldo*0.50
    sueldo+=porcentaje
}else if(anos>=5){
    porcentaje=sueldo*0.20
    sueldo+=porcentaje
}else{
    porcentaje=sueldo*0.05
    sueldo+=porcentaje
}


//Forma funcion(El gordo de mierda dice que no se deben usar pero usare un ejemplo)
function calcularSueldo(anos){
    let sueldo=40000;
    let porcentaje=0;

    if(anos>=10){
        porcentaje=sueldo*0.50
        sueldo+=porcentaje
    }else if(anos>=5&&anos<10){
        porcentaje=sueldo*0.20
        sueldo+=porcentaje
    }else{
        porcentaje=sueldo*0.05
        sueldo+=porcentaje
    }
    return sueldo
};

console.log(calcularSueldo(anos));