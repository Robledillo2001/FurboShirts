let mult=[];

for(let i=0;i<10;i++){
    mult[i]=[];
    for(let j=0;j<=10;j++){
        mult[i][j]=i*j;
        console.log(`${i}*${j}=${mult[i][j]}`);
    }
}