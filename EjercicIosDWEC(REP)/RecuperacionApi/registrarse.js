document.addEventListener("DOMContentLoaded", () => {
    document.getElementById("registro").addEventListener("submit", function(event) {//Evento que guarda los datos del form
        event.preventDefault();

        const user = document.getElementById("user").value.trim();
        const correo = document.getElementById("correo").value.trim();
        const password = document.getElementById("password").value.trim();
        //Expresiones regulares para la contraseña y el correo
        const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        const passwordRegex = /^[a-zA-Z0-9!@#$%^&*]{6,18}$/;

        //Si ninguna expresion se cumple no se registra usuario
        if (!emailRegex.test(correo)) {
            alert("Correo no válido. Ingrese un correo válido.");
            return;
        }

        if (!passwordRegex.test(password)) {
            alert("Contraseña no válida. Debe tener entre 6 y 18 caracteres.");
            return;
        }

        // Guardar en localStorage
        const usuario = { user, correo, password };
        localStorage.setItem("usuario", JSON.stringify(usuario));

        alert("Usuario registrado correctamente. Redirigiendo...");
        window.location.href = "login.html"; // Redirige al login
    });
});
