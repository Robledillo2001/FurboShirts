let cadena="";
let al=Math.floor(Math.random()*50)+1;
for(let i=0;i<al;i++){
    let al2=Math.floor(Math.random()*50)+1;
    for(let i=0;i<al2;i++){
        cadena+=" ";
    }
    cadena+="\n";
}
console.log(cadena);

let arr=[];


for(let i=0;i<10;i++){
    let num=Math.floor(Math.random()*9)+1;
    arr.push([]);
    
    for(let j=0;j<10;j++){
        num=Math.floor(Math.random()*9)+1;
        arr[i].push(num);
        console.log(arr[i][j]);
    }

}
