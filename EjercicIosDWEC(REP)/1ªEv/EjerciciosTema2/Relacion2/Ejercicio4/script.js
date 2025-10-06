let temperatura=parseFloat(prompt("¿Que tiempo hace?"))

if(!isNaN(temperatura)){
    if(temperatura<23){
        alert("HACE FRIO");
    }else if(temperatura>=23&&temperatura<30){
        alert("ES UN BUEN DIA")
    }else if(temperatura>=30){
        alert("HACE CALOR")
    }
}else{
    alert("¡Debes escribir un Nº!");
}