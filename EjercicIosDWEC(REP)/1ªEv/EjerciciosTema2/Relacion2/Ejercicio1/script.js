const mostrarMenu=()=>{
    let opcion=prompt("Elige una opción:\na) Saludo\nb) Despedida");
    if(opcion.toUpperCase()=="a"||opcion.toLowerCase()=="a"){
        alert("Hola que tal");
    }else if(opcion.toUpperCase()=="b"||opcion.toLowerCase()=="b"){
        alert("Hasta pronto");
    }else{
        alert("Opcion Incorrecta");
    }
}
mostrarMenu();