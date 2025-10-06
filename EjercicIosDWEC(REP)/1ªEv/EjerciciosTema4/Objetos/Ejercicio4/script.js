document.addEventListener("DOMContentLoaded", function (event) {
    function Producto(cantidad, precio) {
        this.cantidad = cantidad;
        this.precio = precio;
    }

    Producto.prototype.getCantidad = function () {
        return this.cantidad;
    }

    Producto.prototype.getPrecio = function () {
        return this.precio + "€";
    }

    Producto.prototype.getPrecioFinal = function () {
        return this.cantidad * this.precio;
    }

    let agregar = document.getElementById("agregar");
    let generar = document.getElementById("generar");
    let productos = [];

    let agregarProducto = function (e) {
        e.preventDefault();
        let cantidad = parseInt(document.getElementById("cantidad").value, 10);
        let precio = parseFloat(document.getElementById("precio").value);

        if (!isNaN(cantidad) && !isNaN(precio)) {
            productos.push(new Producto(cantidad, precio));
            document.getElementById("cantidad").value = '';
            document.getElementById("precio").value = '';
        }
    }

    let generarTicket = function (e) {
        e.preventDefault();
        let ticketText = "***********Cantidad****Precio*****Total\n";
        let totalPrecio = 0;

        for (let i = 0; i < productos.length; i++) {
            let cantidad = productos[i].getCantidad();
            let precio = productos[i].getPrecio();
            let precioFinal = productos[i].getPrecioFinal();
            totalPrecio += precioFinal;
            ticketText += `Producto ${(i + 1)} ${cantidad} ${precio} ${precioFinal.toFixed(2)}€\n`;
        }

        ticketText += "Precio final " + totalPrecio.toFixed(2) + "€";
        document.getElementById("ticket").value = ticketText;
        productos = [];
    }

    agregar.addEventListener("click", agregarProducto);
    generar.addEventListener("click", generarTicket);
});