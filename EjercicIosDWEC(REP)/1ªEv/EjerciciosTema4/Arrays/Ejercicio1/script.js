let array=[];

for(let i=0;i<10;i++){
    let al=Math.floor(Math.random()*10000)+1;
    array.push(al);
    console.log(`Numero ${i+1}: ${array[i]}`)
}