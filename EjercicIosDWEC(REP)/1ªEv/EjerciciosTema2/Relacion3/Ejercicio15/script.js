let resultado=0;
console.log(`Tabla de multiplicar`)
for(let i=1;i<=12;i++){
  console.log(`Tabla del ${i}`);
  for(let j=1;j<=10;j++){
    resultado=i*j
    console.log(`${i}*${j}=${resultado}`)
  }
}