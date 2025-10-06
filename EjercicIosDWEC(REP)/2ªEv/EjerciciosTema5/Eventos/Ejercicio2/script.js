let Velodidad=document.getElementById("velocity")

document.addEventListener("keyup",(event)=>{
    let total = parseInt(Velodidad.textContent) || 0;

    if (event.key === "ArrowUp") {
        if (total < 120) {
        total += 1;
        Velodidad.textContent = total;
        } else {
            alert("No se puede ir a más de 120 por la autovía");
        }
    }
});

document.addEventListener("keydown",(event)=>{
    let total = parseInt(Velodidad.textContent) || 0;

    if (event.key === "ArrowDown") {
        if (total > 0) {
            total -= 1;
            Velodidad.textContent = total;
        } else {
            alert("No se puede bajar de 0");
        }
    }
});