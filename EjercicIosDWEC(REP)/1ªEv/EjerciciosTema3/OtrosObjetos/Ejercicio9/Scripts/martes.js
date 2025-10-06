let fecha = new Date();
let dias = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"];
let meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

let diaActual = dias[fecha.getDay()];
let mesActual = meses[fecha.getMonth()];

console.log(`Hoy es ${diaActual} ${fecha.getDay()} de ${mesActual} de ${fecha.getFullYear()} y son las ${fecha.getHours()}:${fecha.getMinutes()}`);