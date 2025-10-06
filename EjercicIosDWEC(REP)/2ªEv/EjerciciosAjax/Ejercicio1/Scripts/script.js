document.addEventListener("DOMContentLoaded", () => {
    let contenedor = document.getElementById("usuario");

    fetch("https://randomuser.me/api/") // URL corregida
        .then((response) => {
            if (!response.ok) throw new Error("Error HTTP: " + response.status);
            return response.json(); // json() con paréntesis
        })
        .then((data) => {
            mostrarUsuario(data.results[0]); // Se pasa el usuario correcto
        })
        .catch((error) => {
            contenedor.innerHTML = `<p class="error">${error.message}</p>`; // Mensaje detallado
        });

    function mostrarUsuario(usuario) { // Nombre de función en singular
        const direccion = `${usuario.location.street.number} ${usuario.location.street.name}, ${usuario.location.city}, ${usuario.location.state}`;
        contenedor.innerHTML = `
            <img src="${usuario.picture.large}" alt="Foto de perfil">
            <p><strong>Nombre:</strong> ${usuario.name.first} ${usuario.name.last}</p>
            <p><strong>Email:</strong> ${usuario.email}</p>
            <p><strong>Dirección:</strong> ${direccion}</p>
            <p><strong>Estado:</strong> ${usuario.location.state}</p>
        `;
    }
});