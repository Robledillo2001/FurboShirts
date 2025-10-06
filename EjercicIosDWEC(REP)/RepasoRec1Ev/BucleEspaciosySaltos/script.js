let num=Math.floor(Math.random()*50)+1;
let cadena="";

for(let i=0;i<num;i++){
    let num2=Math.floor(Math.random()*50)+1;
    for (let j=0;j<num2;j++){
        cadena+=" ";
    }
    cadena+="\n";
}
console.log(cadena)