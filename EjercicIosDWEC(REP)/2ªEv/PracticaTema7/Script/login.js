document.addEventListener("DOMContentLoaded", () => {
    document.getElementById("login").addEventListener("submit", function(event) {//Evento al enviar datos del form
        event.preventDefault();

        const correoIngresado = document.getElementById("user").value.trim();
        const passwordIngresado = document.getElementById("password").value.trim();

        const usuarioGuardado = JSON.parse(localStorage.getItem("usuario"));//Accedemos a los datos para ver si hay un user registrado

        if (!usuarioGuardado) {//Si no hay ningun user saltara una alerta
            alert("No hay usuarios registrados.");
            return;
        }

        if (usuarioGuardado.correo === correoIngresado && usuarioGuardado.password === passwordIngresado) {//Si puede acceder a los datos del usuario
            alert("Inicio de sesión exitoso.");
            window.location.href = "index.html"; // Redirigir a la página principal
        } else {
            alert("Correo o contraseña incorrectos.");
        }
    });
});