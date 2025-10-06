let fotoActual = document.getElementById("fotoActual").querySelector("img");
let inicio = document.getElementById("inicio");
let final = document.getElementById("final");
let mititulo = document.getElementById("mititulo");

let contador = 1;

// Evento para el botón "Inicio"
inicio.addEventListener("click", () => {
    contador = 1;  // Reseteamos el contador a 1
    fotoActual.src = "imagenesEjercicio7/foto1.jpg";
    mititulo.textContent = "1. India - Agra - El Taj Mahal.";
});

// Evento para el botón "Final"
final.addEventListener("click", () => {
    contador = 8;  // Ponemos el contador en 8 (última imagen)
    fotoActual.src = "imagenesEjercicio7/foto8.jpg";
    mititulo.textContent = "8. España - Tarragona - Acueducto romano.";
});

// Evento para el botón "Siguiente"
let siguiente = document.getElementById("siguiente");
siguiente.addEventListener("click", () => {
    if (contador < 8) {  // Solo si no estamos en la última imagen
        contador += 1;  // Incrementamos el contador
        fotoActual.src = `imagenesEjercicio7/foto${contador}.jpg`;
        if(contador==1){
            mititulo.textContent = "1. India - Agra - El Taj Mahal.";
        }else if(contador==2){
            mititulo.textContent = "2. Albania - Region de Ballsh.";
        }else if(contador==3){
            mititulo.textContent = "3. Atenas- Partenón.";
        }else if(contador==4){
            mititulo.textContent = "4. Bélgica - Amberes.";
        }else if(contador==5){
            mititulo.textContent = "5. Costa Rica - Parque nacional de la Amistad.";
        }else if(contador==6){
            mititulo.textContent = "6. Egipto - Templo de Abu Simbel.";
        }else if(contador==7){
            mititulo.textContent = "7. España - Albacete ciudad.";
        }else if(contador==8){
            mititulo.textContent = "8. España - Tarragona - Acueducto romano.";
        }
    } else {
        alert("Ya no hay más imágenes");
    }
});

// Evento para el botón "Anterior"
let anterior = document.getElementById("anterior");
anterior.addEventListener("click", () => {
    if (contador > 1) {  // Solo si no estamos en la primera imagen
        contador -= 1;  // Decrementamos el contador
        fotoActual.src = `imagenesEjercicio7/foto${contador}.jpg`;
        if(contador==1){
            mititulo.textContent = "1. India - Agra - El Taj Mahal.";
        }else if(contador==2){
            mititulo.textContent = "2. Albania - Region de Ballsh.";
        }else if(contador==3){
            mititulo.textContent = "3. Atenas- Partenón.";
        }else if(contador==4){
            mititulo.textContent = "4. Bélgica - Amberes.";
        }else if(contador==5){
            mititulo.textContent = "5. Costa Rica - Parque nacional de la Amistad.";
        }else if(contador==6){
            mititulo.textContent = "6. Egipto - Templo de Abu Simbel.";
        }else if(contador==7){
            mititulo.textContent = "7. España - Albacete ciudad.";
        }else if(contador==8){
            mititulo.textContent = "8. España - Tarragona - Acueducto romano.";
        }
    } else {
        alert("Ya no hay más imágenes");
    }
});
