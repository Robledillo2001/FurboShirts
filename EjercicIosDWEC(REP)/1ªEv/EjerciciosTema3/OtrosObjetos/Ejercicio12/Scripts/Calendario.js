let año;
let dias=1;
let enviarButton=document.getElementById("Enviar")

enviarButton.addEventListener("click", function() {
    let mes=parseInt(document.getElementById("id").value);
    do{
        año=parseInt(prompt("Introduce un año"));
    }while(isNaN(año)||año<1970);

    let fechaActualizada;

    dias=1;

    do {
        fechaActualizada = new Date(año, mes, dias);
        dias++;
        console.log(fechaActualizada);
    } while (fechaActualizada.getMonth() == mes);
    console.log(fechaActualizada.getDate());
});