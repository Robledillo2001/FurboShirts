let texto=prompt("Escribe un texto");

let fechainicio=new Date();
let intervalo=setInterval(function(){
    let cambio=texto.split("");
    
    let fecha=new Date();
    let tiempo=fecha.getTime()-fechainicio.getTime();

    let minutos=Math.floor(tiempo/(1000*60))
    let segundo=Math.floor((tiempo/1000)%60);
    
    if(minutos<10){
        if(minutos%2==0){
            cambio.push(cambio.shift());
            document.title=cambio.join("");
        }else{
            cambio.unshift(cambio.pop());
            document.title=cambio.join("");
        }
        console.log(`Minutos${minutos}:${segundo}`)
    }else{
        alert("Se acabo el tiempo");
        clearInterval(intervalo);
    }
},500);

