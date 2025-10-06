let texto=prompt("Escriba algo");
let letra='';
    let random=Math.floor(Math.random()*texto.length);
    letra=texto.charAt(random);
console.log(letra);