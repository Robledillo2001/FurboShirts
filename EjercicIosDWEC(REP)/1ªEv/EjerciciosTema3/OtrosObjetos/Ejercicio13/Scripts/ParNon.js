let eleccionPares=document.getElementById("pares");
let eleccionInPares=document.getElementById("nones");
let boton=document.getElementById("Jugar");

let imagenElegida=document.getElementById("imagenElegida");
let imagenOponente=document.getElementById("imagenOponente")

let textoResultado=document.getElementById("textoResultado");
let imagenResultado=document.getElementById("imagenResultado");

function cero(){
    boton.style.display = "inline-block";
    imagenElegida.src = "IMG/0.PNG";
    numerosDedosUsuario = 0;
}

function uno(){
    boton.style.display = "inline-block";
    imagenElegida.src = "IMG/1.PNG";
    numerosDedosUsuario = 1;
}

function dos(){
    boton.style.display = "inline-block";
    imagenElegida.src = "IMG/2.PNG";
    numerosDedosUsuario = 2;
}

function tres(){
    boton.style.display = "inline-block";
    imagenElegida.src = "IMG/3.PNG";
    numerosDedosUsuario = 3;
}

function cuatro(){
    boton.style.display = "inline-block";
    imagenElegida.src = "IMG/4.PNG";
    numerosDedosUsuario = 4;
}

function cinco(){
    boton.style.display = "inline-block";
    imagenElegida.src = "IMG/5.PNG";
    numerosDedosUsuario = 5;
}

document.getElementById("cero").addEventListener("click",cero);

document.getElementById("uno").addEventListener("click",uno);

document.getElementById("dos").addEventListener("click", dos);

document.getElementById("tres").addEventListener("click", tres);

document.getElementById("cuatro").addEventListener("click", cuatro);

document.getElementById("cinco").addEventListener("click", cinco);

boton.addEventListener("click", function () {
    let oponente = Math.floor(Math.random() * 6);
    imagenOponente.src = `IMG/${oponente}.PNG`;
    let eleccion = eleccionPares.checked ? 0 : 1;
    if ((oponente + numerosDedosUsuario) % 2 == eleccion) {
        textoResultado.textContent = "HAS GANADO!";
        imagenResultado.src = "IMG/acierto.PNG";
    } else {
        textoResultado.textContent = "HAS PERDIDO!";
        imagenResultado.src = "IMG/error.PNG";
    }
});
