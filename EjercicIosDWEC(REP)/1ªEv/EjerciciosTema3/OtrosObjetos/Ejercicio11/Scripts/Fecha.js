let sumarDias=function(fecha,dias){
    let resultado=new Date(fecha);
    resultado.setDate(resultado.getDate() + dias);
    return resultado;
}
let fechaHoy=new Date();

fechaHoy.setDate(fechaHoy.getDate());
console.log(`${fechaHoy.getDay()}-${fechaHoy.getMonth()}-${fechaHoy.getFullYear()}`);
console.log(fechaHoy);

let dias30=sumarDias(fechaHoy,30);

let dias60=sumarDias(fechaHoy,60);

let dias90=sumarDias(fechaHoy,90);

console.log(dias30+"\n"+dias60+"\n"+dias90)
