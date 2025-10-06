// js/app10.js
document.addEventListener("DOMContentLoaded", ()=>{
    const contenedor = document.getElementById("contenedor-usuarios");
    
    fetch("https://randomuser.me/api/?results=10")
        .then(response => {
            if (!response.ok) throw new Error("Error HTTP: " + response.status);
            return response.json();
        })
        .then(data => {
            contenedor.innerHTML = "";
            data.results.forEach(usuario => crearTarjetaUsuario(usuario));
        })
        .catch(error => {
            contenedor.innerHTML = `<p class="error">${error.message}</p>`;
        });
});

function crearTarjetaUsuario(usuario) {
    const contenedor = document.getElementById("contenedor-usuarios");
    const divUsuario = document.createElement("div");
    divUsuario.className = "usuario";
    
    const direccion = `${usuario.location.street.number} ${usuario.location.street.name}`;
    divUsuario.innerHTML = `
        <img src="${usuario.picture.medium}" alt="Foto">
        <p>${usuario.name.first} ${usuario.name.last}</p>
        <p>${usuario.email}</p>
        <p>${direccion}, ${usuario.location.city}</p>
        <button onclick="actualizarUsuario(this)">Cambiar</button>
    `;
    
    contenedor.appendChild(divUsuario);
}

function actualizarUsuario(boton) {
    const tarjetaUsuario = boton.parentElement;
    tarjetaUsuario.innerHTML = '<p class="cargando">Esperando usuario nuevo...</p>';
    
    fetch("https://randomuser.me/api/")
        .then(response => {
            if (!response.ok) throw new Error("Error al actualizar");
            return response.json();
        })
        .then(data => {
            const nuevoUsuario = data.results[0];
            mostrarNuevoUsuario(tarjetaUsuario, nuevoUsuario);
        })
        .catch(error => {
            tarjetaUsuario.innerHTML = `<p class="error">${error.message}</p>`;
        });
}

function mostrarNuevoUsuario(contenedor, usuario) {
    const direccion = `${usuario.location.street.number} ${usuario.location.street.name}`;
    contenedor.innerHTML = `
        <img src="${usuario.picture.medium}" alt="Foto">
        <p>${usuario.name.first} ${usuario.name.last}</p>
        <p>${usuario.email}</p>
        <p>${direccion}, ${usuario.location.city}</p>
        <button onclick="actualizarUsuario(this)">Cambiar</button>
    `;
}