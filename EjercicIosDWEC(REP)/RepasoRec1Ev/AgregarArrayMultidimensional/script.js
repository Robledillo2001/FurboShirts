let arr=[];

for(let i=0;i<10;i++){
    let al1=Math.floor(Math.random()*9)+1
    arr.push([al1]);
    for(let j=0;j<10;j++){
        let al2=Math.floor(Math.random()*9)+1
        arr[i].push(al2);
    }
}
let suma=0;
for(let i=0;i<arr.length;i++){
    for(let j=0;j<arr[i].length;j++){
        suma+=arr[i][j];
        document.write(`${arr[i][j]} `); 
    }
}
document.write(`<br>Suma total=${suma}`);
