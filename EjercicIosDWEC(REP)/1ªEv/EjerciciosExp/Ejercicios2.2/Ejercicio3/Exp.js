// Validar URL con un prompt
function validarURL() {
    const url = prompt("Introduce una URL:");
    const regex = new RegExp(
        "^" +
          "(https?:/{0,3}|ftp://|file:///)?" +        // Protocolo (http, https, ftp, file) opcional
          "([a-zA-Z0-9.-]+(:[^\\s@]*)?@)?" +         // Usuario opcional seguido de contraseña (opcional)
          "([a-zA-Z0-9-]+\\.)+[a-zA-Z0-9-]+" +       // Nombre del dominio o máquina
          "(:\\d+)?" +                               // Puerto opcional
          "(/[a-zA-Z0-9._/-]*)?" +                   // Ruta opcional
          "(\\?[^\\s]*)?" +                          // Cadena de búsqueda opcional
          "$"
    );

    const resultado = regex.test(url);
    const mensaje = resultado ? "La URL es válida." : "La URL no es válida.";

    // Mostramos el resultado en la consola
    console.log(mensaje);
    return mensaje; // Retornamos el mensaje por si se necesita
}

// Calcular letra de URL con un prompt
function calcularURL() {
    const urlInput = prompt("Introduce el número de la URL (como si fuera un DNI/NIF):").toUpperCase();
    const tablaLetras = "TRWAGMYFPDXBNJZSQVHLCKE";

    // Reemplazo inicial para X, Y, Z
    const urlNumerico = urlInput.replace(/^X/, "0").replace(/^Y/, "1").replace(/^Z/, "2");

    if (!/^\d+$/.test(urlNumerico)) {
        console.log("La URL introducida no es válida.");
        return "La URL introducida no es válida.";
    }

    const numero = parseInt(urlNumerico, 10);
    const resto = numero % 23;
    const letra = tablaLetras[resto];

    const mensaje = `La letra correspondiente a la URL es: ${letra}`;
    console.log(mensaje);
    return mensaje; // Retornamos el mensaje por si se necesita
}

// Ejemplo de uso
const resultadoValidar = validarURL(); // Llama a validarURL y muestra el resultado en la consola
const resultadoCalcular = calcularURL(); // Llama a calcularURL y muestra el resultado en la consola
