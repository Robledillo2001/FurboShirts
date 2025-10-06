let min;
let max;
    for(i=0;i<10;i++){
        if(i==0){
            min=i;
        }else if(i==9){
            max=i;
        }
    }
    console.log(min+"-"+max);
    let random=Math.floor(Math.random()*(min-max+1)+min);
    console.log("Numero-->"+random)

