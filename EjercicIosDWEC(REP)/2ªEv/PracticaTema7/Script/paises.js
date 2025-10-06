window.addEventListener("DOMContentLoaded",()=>{
    let grafico; // Variable global para el gráfico

    // Evento para manejar el envío del formulario
    document.getElementById("form").addEventListener("submit", (ev) => {
        ev.preventDefault(); // Evita que el formulario recargue la página

        const idioma = document.getElementById("lenguaje").value.trim();
        if (!idioma) {
            alert("Por favor, escribe un idioma.");
            return;
        }

        const regex = /^[A-Za-z\s]+$/;//Expresion regular para evitar que se quede vacio el campo de idioma
            
        if (!regex.test(idioma)) {
        alert("El idioma solo puede contener letras y espacios.");
        return;
        }

        const url = `https://restcountries.com/v3.1/lang/${idioma}`;

        fetch(url)
            .then((response) => {//Si se resueve la solicitud del enlace
                if (!response.ok) {//Si no se resuelve mostrara un error
                    throw new Error("Idioma no encontrado o error en la solicitud.");
                }
                return response.json();//la respuesta se convierte en formato json
            })
            .then((data) => {
            mostrarDatosEnTabla(data); // Mostrar todos los países que hablan el idioma
            mostrarGraficoPoblacion(data); // Mostrar el gráfico de población
            })
            .catch((error) => {
                console.error("Error:", error);
                alert("Idioma no encontrado o error en la solicitud.");
            });
    });

    // Función para mostrar los datos de los países en la tabla
    async function mostrarDatosEnTabla(paises) {
    const tbody = document.querySelector("#tablaPais tbody");
    tbody.innerHTML = ""; // Limpiamos la tabla antes de insertar nuevos datos

        if (paises.length === 0) {
            tbody.innerHTML = `<tr><td colspan="6">No se encontraron países para este idioma.</td></tr>`;
            return;
        }

        // Crear una fila por cada país
        paises.forEach((pais) => {
            const poblacion=formatearPoblacion(pais.population);
            const fila = `
            <tr>
            <td>${pais.name.common}</td>
            <td>${pais.capital?.[0] || "N/A"}</td>
            <td>${poblacion}</td>
            <td>${pais.region}</td>
            <td>${pais.currencies ? Object.values(pais.currencies)[0].name : "N/A"} (${pais.currencies ? Object.values(pais.currencies)[0].symbol : "N/A"})</td>
            <td><img src="${pais.flags.png}" alt="Bandera de ${pais.name.common}"></td>
            </tr>`;
                
        tbody.innerHTML += fila;
        });
    }

    function formatearPoblacion(poblacion){
    if(poblacion>=1000000){
        return `${(poblacion / 1000000).toFixed(2)} M`;
        }else if(poblacion>=1000){
        return `${(poblacion / 1000).toFixed(2)} K`;
        }else{
        return poblacion.toLocaleString();
        }
    }

    function generarColores(cantidad) {
        const colores = [];
        for (let i = 0; i < cantidad; i++) {
            const color = `rgba(${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, 0.7)`;
            colores.push(color);
        }
        return colores;
    }
        
    // Función para mostrar el gráfico de población con colores variados
    async function mostrarGraficoPoblacion(paises) {
        const ctx = document.getElementById("graficoPoblacion").getContext("2d");
            
        // Destruir el gráfico anterior si existe
        if (grafico) {
            grafico.destroy();
        }
            
        // Preparar los datos para el gráfico
        const nombresPaises = paises.map((pais) => pais.name.common);
        const poblaciones = paises.map((pais) => pais.population);
        const colores = generarColores(nombresPaises.length);
            
        // Crear el gráfico
        grafico = new Chart(ctx, {
            type: "bar", // Tipo de gráfico (pastel)
            data: {
                labels: nombresPaises,
                datasets: [{
                    label: "Población",
                    data: poblaciones,
                    backgroundColor: colores, // Colores dinámicos para cada país
                    borderColor: colores.map(color => color.replace('0.7', '1')), // Bordes más oscuros
                    borderWidth: 1,
                }],
            },
            options: {
                plugins: {
                    legend: {
                        position: 'right',
                    },
                },
            },
        });
    }
    document.getElementById("cerrarSesion").addEventListener("click",()=>{
        localStorage.removeItem("userLogged");
        window.location.href = "login.html";
    })      
});