document.addEventListener("DOMContentLoaded",()=>{
    function obtenerPosiciones(){
        return[window.screenX,window.screenY];
    }

    document.getElementById("botonPosicion").addEventListener("click",()=>{
        const posicion=obtenerPosiciones();
        
        alert(`Las posiciones de la ventana es de (${posicion[0]},${posicion[1]})`)
    });
})