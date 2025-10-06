let letra=prompt("Escriba una letrita");
let comprobacion="AEIOU"

if(letra.length==1){
    if (comprobacion.includes(letra.toUpperCase())) {
        alert(`La letra ${letra} es una vocal`);
    }else{
        alert(`La letra ${letra} no es una vocal`);
    }
}else{
    alert("Te pide una letra solo no mas de una");
}