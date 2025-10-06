let imagen=document.getElementById("imagen");
let form=document.getElementById("formulario");
let tipo=document.getElementById("tipo");
let serie=document.getElementById("serie");
let MostrarDescripcion=document.getElementById("mostrarDescripcion");

tipo.addEventListener("change",()=>{
    if(tipo.value=="distribucion"){
        imagen.src="imagenesEjercicio6/distribucion.jpg"
    }else if(tipo.value=="oficina"){
        imagen.src="imagenesEjercicio6/oficina.jpg"
    }else if(tipo.value=="produccion"){
        imagen.src="imagenesEjercicio6/produccion.jpg"
    }
})

MostrarDescripcion.addEventListener("click", () => {
    let descripcion = "";
    switch (tipo.value) {
        case "distribucion":
            descripcion = "Esta es una imagen relacionada con la distribución.";
            break;
        case "oficina":
            descripcion = "Esta es una imagen relacionada con una oficina.";
            break;
        case "produccion":
            descripcion = "Esta es una imagen relacionada con la producción.";
            break;
        default:
            descripcion = "Por favor, selecciona un tipo válido.";
    }
    alert(descripcion);
});


form.addEventListener("submit", (event) => {
    if (!serie.value.trim()) {
        event.preventDefault(); // Evita el envío del formulario
        alert("Por favor, ingresa un número de serie.");
    } else {
        alert(`Formulario enviado con éxito. Serie: ${serie.value}`);
    }
});

