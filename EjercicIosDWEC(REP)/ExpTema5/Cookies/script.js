function crearCookie(nombre,edad) {
      let fecha = new Date();
      fecha.setFullYear(2025, 7, 24); // Febrero
      let fechaExpiracion = fecha.toUTCString();

      document.cookie = `nombre=${nombre};expires=${fechaExpiracion};path=/`;
      document.cookie = `edad=${edad};expires=${fechaExpiracion};path=/`;
    }

    function eliminarCookie() {
      document.cookie = `nombre=;expires=Sat, 01 Jan 2000 00:00:01 GMT;path=/`;
    }

    crearCookie("Ruben",24);

    console.log("Cookies disponibles:", document.cookie);

    let arrayCookies = document.cookie.split(";");

    for (let cookie of arrayCookies) {
      let [clave, valor] = cookie.trim().split("=");
      console.log(`Clave: ${clave}, Valor: ${valor}`);
    }