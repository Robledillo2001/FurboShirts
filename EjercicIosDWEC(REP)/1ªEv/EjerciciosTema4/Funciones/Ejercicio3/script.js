let arrayAbecedario = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'ñ', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
        let arraySolucion = Array(arrayAbecedario.length).fill(0);

        let transformarString = (cadena) => {
            return cadena.toLowerCase();
        }

        let comprobarCaracter = (array, letra) => {
            return array.indexOf(letra);
        }

        document.getElementById("boton").addEventListener("click", function(e) {
            e.preventDefault();

            // Resetea el contador cada vez que se presiona el botón
            arraySolucion.fill(0);

            // Obtiene el valor del texto ingresado
            let texto = document.getElementById("texto").value;

            // Itera sobre cada carácter de la cadena
            for (let i = 0; i < texto.length; i++) {
                let caracter = transformarString(texto[i]);
                let indice = comprobarCaracter(arrayAbecedario, caracter);

                // Si el carácter está en el array de abecedario, incrementa el contador correspondiente
                if (indice !== -1) {
                    arraySolucion[indice]++;
                }
            }

            // Muestra el resultado en el área de texto "resultado"
            let resultado = document.getElementById("resultado");
            resultado.value = '';  // Borra el contenido previo

            for (let i = 0; i < arrayAbecedario.length; i++) {
                if (arraySolucion[i] > 0) {  // Muestra solo las letras que aparecen
                    resultado.value += `Veces que aparece ${arrayAbecedario[i]} = ${arraySolucion[i]}\n`;
                }
            }
        });