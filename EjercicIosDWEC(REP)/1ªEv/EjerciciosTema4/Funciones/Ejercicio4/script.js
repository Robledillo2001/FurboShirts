document.addEventListener("DOMContentLoaded", function () {
    let arrayAbecedario=['a','b','c','d','e','f','g','h','i','j','k','l','ñ','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];
    let transformarString=(cadena)=> {
        return cadena.toLowerCase();
    }
    let codificarCaracter=(desplazamiento,array,caracter)=>{
        let indice=array.indexOf(caracter);
        if(indice!=-1){
            let nuevaPosicion=(indice+desplazamiento+array.length)%array.length;
            return array[nuevaPosicion];
        }
        return caracter;
    }
    let descodificarCaracter=(desplazamiento,array,caracter)=>{
        return codificarCaracter(-desplazamiento,caracter,array);
    }

    document.getElementById("cifrar").addEventListener("click", function (e) {
        e.preventDefault();
        const mensajeOriginal = document.getElementById("mensaje").value;
        const clave = parseInt(document.getElementById("texto").value, 10);

        let mensajeCifrado = "";
        for (let i = 0; i < mensajeOriginal.length; i++) {
            const caracter = transformarString(mensajeOriginal[i]);
            const caracterCifrado = codificarCaracter(clave, arrayAbecedario, caracter);
            mensajeCifrado += caracterCifrado;
        }

        document.getElementById("resultado").value = mensajeCifrado;
    });

    document.getElementById("descifrar").addEventListener("click", function (e) {
        e.preventDefault();
        const mensajeCifrado = document.getElementById("mensaje").value;
        const clave = parseInt(document.getElementById("texto").value, 10);

        let mensajeDescifrado = "";
        for (let i = 0; i < mensajeCifrado.length; i++) {
            const caracter = transformarString(mensajeCifrado[i]);
            const caracterDescifrado = descodificarCaracter(clave, arrayAbecedario, caracter);
            mensajeDescifrado += caracterDescifrado;
        }

        document.getElementById("resultado").value = mensajeDescifrado;
    });
});