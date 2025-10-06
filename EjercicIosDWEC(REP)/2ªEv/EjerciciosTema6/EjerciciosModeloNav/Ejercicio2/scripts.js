/*
    Consigue que cada vez que el usuario vuelva a la página (incluso cerrando el navegador), tenga la página con scroll en la misma posición que la última vez
*/
document.addEventListener("DOMContentLoaded",()=>{

    console.log("CARGA");
    if ( document.cookie.includes("scrollX" && "scrollY")){
        let arrayCookie=document.cookie.split(";");

        for(let cookies of arrayCookie){
            let scrolls = cookies.split("=");
            console.log(scrolls);

        }
    }

    
    function obtenerPosiciones(){
        console.log("OBTENER");
        return[window.scrollX,window.scrollY];
    }

    document.addEventListener("scroll",()=>{
        let posiciones = obtenerPosiciones();
        document.cookie =`scrollX=${posiciones[0]}`;
        document.cookie =`scrollY=${posiciones[1]}`;
    });

});