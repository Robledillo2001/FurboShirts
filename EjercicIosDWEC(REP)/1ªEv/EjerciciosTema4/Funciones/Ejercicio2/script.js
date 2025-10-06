const calcularDni = (e) => {
    e.preventDefault(); // Evita que el formulario se envíe y recargue la página

    let numeroDni = document.getElementById("numero").value;
    let letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'];
    
    // Verifica que el número de DNI sea un número y esté en el rango válido
    if (numeroDni.length === 8 && !isNaN(numeroDni) && numeroDni >= 0 && numeroDni <= 99999999) {
        // Calcula la posición de la letra en el array
        let posicion = numeroDni % 23;
        let letraDni = letras[posicion];
        let DniCompleto = `${numeroDni}${letraDni}`;
        
        // Muestra el DNI completo en el <textarea> con id "dni"
        document.getElementById("dni").value = DniCompleto;
    } else {
        alert("Por favor, introduce un número de DNI válido (8 dígitos numéricos).");
        document.getElementById("dni").value = ''; // Limpia el campo de resultado
    }
}

let boton=document.getElementById("boton");
boton.addEventListener("click",calcularDni);