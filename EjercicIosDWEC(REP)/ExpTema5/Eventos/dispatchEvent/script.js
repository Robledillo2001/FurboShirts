let boton1 = document.getElementById("boton1");
let boton2 = document.getElementById("boton2");

// Evento en boton1: pinta el fondo de rojo
boton1.addEventListener("click", () => {
    document.body.style.backgroundColor = "red";
});

// Evento en boton2: dispara un evento click en boton1
boton2.addEventListener("click", () => {
    let eventoClick = new Event("click"); // Crear evento
    boton1.dispatchEvent(eventoClick); // Disparar evento en boton1
});