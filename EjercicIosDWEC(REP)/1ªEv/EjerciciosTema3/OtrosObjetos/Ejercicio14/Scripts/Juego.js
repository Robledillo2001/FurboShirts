let boton=document.getElementById("Jugar");

let imagenElegida=document.getElementById("imagenElegida");
let imagenOponente=document.getElementById("imagenOponente")

let textoResultado=document.getElementById("textoResultado");
let imagenResultado=document.getElementById("imagenResultado");

function piedra(){
    boton.style.display = "inline-block";
    imagenElegida.src = "IMG/piedra.PNG";
}

function papel(){
    boton.style.display = "inline-block";
    imagenElegida.src = "IMG/papel.PNG";
}

function tijeras(){
    boton.style.display = "inline-block";
    imagenElegida.src = "IMG/tijeras.PNG";
}

document.getElementById("piedra").addEventListener("click",piedra);

document.getElementById("papel").addEventListener("click", papel);

document.getElementById("tijeras").addEventListener("click", tijeras);

boton.addEventListener("click", function () {
    let eleccion=Math.floor(Math.random()*3)+1;
    if(eleccion==1){
        imagenOponente.src =`IMG/piedra.PNG`;
    }else if(eleccion==2){
        imagenOponente.src =`IMG/papel.PNG`;
    }else if(eleccion==3){
        imagenOponente.src =`IMG/tijeras.PNG`;
    }
    
    if(imagenElegida.src==imagenOponente.src){
        textoResultado.textContent = "EMPATE!";
        imagenResultado.src = "IMG/empate.PNG";
    }else{
        if(imagenElegida.src.endsWith("piedra.PNG")&&imagenOponente.src.endsWith("papel.PNG")){
            textoResultado.textContent = "HAS PERDIDO!";
            imagenResultado.src = "IMG/error.PNG";
        }
        
        if(imagenElegida.src.endsWith("piedra.PNG")&&imagenOponente.src.endsWith("tijeras.PNG")){
            textoResultado.textContent = "HAS GANADO!";
            imagenResultado.src = "IMG/acierto.PNG";
        }

        if(imagenElegida.src.endsWith("papel.PNG")&&imagenOponente.src.endsWith("piedra.PNG")){
            textoResultado.textContent = "HAS GANADO!";
            imagenResultado.src = "IMG/acierto.PNG";
        }

        if(imagenElegida.src.endsWith("tijeras.PNG")&&imagenOponente.src.endsWith("papel.PNG")){
            textoResultado.textContent = "HAS GANADO!";
            imagenResultado.src = "IMG/acierto.PNG";
        }

        if(imagenElegida.src.endsWith("tijeras.PNG")&&imagenOponente.src.endsWith("piedra.PNG")){
            textoResultado.textContent = "HAS PERDIDO!";
            imagenResultado.src = "IMG/error.PNG";
        }

        if(imagenElegida.src.endsWith("papel.PNG")&&imagenOponente.src.endsWith=="tijeras.PNG"){
            textoResultado.textContent = "HAS PERDIDO!";
            imagenResultado.src = "IMG/error.PNG";
        }

        if(imagenElegida.src.endsWith("tijeras.PNG")&&imagenOponente.src.endsWith("papel.PNG")){
            textoResultado.textContent = "HAS GANADO!";
            imagenResultado.src = "IMG/acierto.PNG";
        }
    }

    
});


