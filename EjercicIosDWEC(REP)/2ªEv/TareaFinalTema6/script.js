document.addEventListener("DOMContentLoaded", () => {
    const paleta = document.getElementById("paleta");
    const zonadibujo = document.getElementById("zonadibujo");
    const pincel = document.getElementById("pincel");
    const p=document.getElementsByTagName("p");
    const activar=document.getElementById("activar");
    const desactivar=document.getElementById("desactivar");


    activar.addEventListener("click",()=>{
        pintando=true;
        pincel.textContent = "PINCEL ACTIVADO";
    });

    desactivar.addEventListener("click",()=>{
        pintando=false;
        pincel.textContent = "PINCEL DESACTIVADO";
    });



    let colorSeleccionado = "red"; // Color inicial
    let pintando = false;

    // Verifica que el contenedor exista
    if (!zonadibujo) {
        console.error("El contenedor 'zonadibujo' no existe en el HTML.");
        return;
    }

    // Crear el tablero de dibujo (30x30 celdas)
    for (let i = 0; i < 30 * 30; i++) {
        const celda = document.createElement("div");
        celda.classList.add("celda");
        zonadibujo.appendChild(celda);

        celda.addEventListener("click",(ev)=>{
            ev.preventDefault();
            if(pintando){
                celda.style.backgroundColor=colorSeleccionado;
            }
        })
    }

    // Seleccionar color de la paleta
    paleta.addEventListener("click", (event) => {
        event.preventDefault();
        if (event.target.classList.contains("color1")) {
            colorSeleccionado = "yellow";
        } else if (event.target.classList.contains("color2")) {
            colorSeleccionado = "green";
        } else if (event.target.classList.contains("color3")) {
            colorSeleccionado = "black";
        } else if (event.target.classList.contains("color4")) {
            colorSeleccionado = "red";
        } else if (event.target.classList.contains("color5")) {
            colorSeleccionado = "blue";
        } else if (event.target.classList.contains("color6")) {
            colorSeleccionado = "white";
        }

        // Actualizar estado del pincel
        pincel.textContent = ` Color seleccionado: ${colorSeleccionado}`;

        // Remover la clase 'seleccionado' de todos los colores
        const colores = paleta.querySelectorAll("td");
        colores.forEach((color) => color.classList.remove("seleccionado"));

        // Agregar la clase 'seleccionado' al color elegido
        event.target.classList.add("seleccionado");
    });
});