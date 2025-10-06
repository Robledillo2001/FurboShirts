let miArray=[];

for(let i=0;i<9;i++){
    let nuevaFila=[];
    for (let j=0;j<7;j++){
        do{
            nuevoNumero=Math.floor(Math.random()*9)+1;
        }while(nuevaFila.lastIndexOf(nuevoNumero)>=0);
        nuevaFila.push(nuevoNumero);
    }
    miArray.push(nuevaFila);
}
let resultado="";
for(let i=0;i<9;i++){
    for(let j=0;j<7;j++){
        resultado+=miArray[i][j]+ " ";
    }
    resultado+="<br>";
}
document.write(resultado);