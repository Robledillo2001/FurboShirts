let number=Math.floor(Math.random()*50)+1;
let number2=Math.floor(Math.random()*50)+1;

let espacio="";
for(let i=0;i<number;i++){

    espacio+=" |";
    
}


for(let j=0;j<number2;j++){
    espacio+="\n";
}
console.log(espacio);
