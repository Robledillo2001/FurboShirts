let miArray=[];
let suma=0;
for(let i=0;i<10;i++){
    miArray[i]=[];
    for(let j=0;j<10;j++){
        miArray[i][j]=Math.floor(Math.random()*9)+1;
        suma+=miArray[i][j];
        document.write(miArray[i][j]+' ');
    }
    document.write("<br>");
}
document.write("Suma de los numeros="+suma);