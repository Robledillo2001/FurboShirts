let suma=0;

for(let i=9;i<=45;i++){
  if((i%3==0||i%7==0)&&!(i>=21&&i<=28)){
    suma+=i;
  }
}
console.log(`Suma es igual a ${suma}`)
