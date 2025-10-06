document.addEventListener("DOMContentLoaded", function (e) {
    let arr = [];

    const mostrarArray = () => {
        let texto = arr.join(' ');
        document.getElementById("area").value = texto;
    }

    function Principio(e) {
        e.preventDefault();
        let valor = document.getElementById("texto").value;
        arr.unshift(valor);
        mostrarArray();
    }

    function Final(e) {
        e.preventDefault();
        let valor = document.getElementById("texto").value;
        arr.push(valor);
        mostrarArray();
    }

    function Extraer_Principio(e) {
        e.preventDefault();
        if (arr.length > 0) {
            let extraerValor = arr.shift();
            document.getElementById("texto").value = extraerValor;
            mostrarArray();
        }
    }

    function Extraer_Final(e) {
        e.preventDefault();
        if (arr.length > 0) {
            let extraerValor = arr.pop();
            document.getElementById("texto").value = extraerValor;
            mostrarArray();
        }
    }

    document.getElementById("principio").addEventListener("click", Principio);
    document.getElementById("final").addEventListener("click", Final);
    document.getElementById("extraer_Principio").addEventListener("click", Extraer_Principio);
    document.getElementById("extraer_Final").addEventListener("click", Extraer_Final);
});