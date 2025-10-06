let numero=parseInt(prompt(`Elige un numero`));

if(numero%2!=0){
  for(let i=numero;i>0;i-=2){
    console.log(" ".repeat((numero - i) / 2) + "*".repeat(i));
  }
}else if(numero%2==0){
  alert("Numero no impar")
}else if(isNaN(numero)){
  alert(`${numero} no es un numero`);
}