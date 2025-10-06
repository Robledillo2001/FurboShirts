function Personas(edad,nombre){
    if(!isNaN(edad)){
        this.edad=edad;
    }
}

Personas.prototype.setEdad=function(edad){
    if(!isNaN(edad)){
        this.edad=edad;
    }
}

Personas.prototype.getEdad=function(){
    console.log(`Edad: ${this.edad}`);
}

function Cine(){
    this.personas=[];
    this.dinero=0;
}

Cine.prototype.ingresarPersonas=function(){
    let personas=Math.floor(Math.random()*60)+5;
    document.write("<ul>")
    for(let i=0;i<personas;i++){
        let edad=Math.floor(Math.random()*50)+5;
        this.personas.push(new Personas(edad));
        document.write(`<li>Persona ${i+1}--->Edad:${this.personas[i].edad}</li>`);
    }
    document.write("</ul>")
}

Cine.prototype.recaudarDinero=function(){
    for(let i=0;i<this.personas.length;i++){
        if(this.personas[i].edad>=5&&this.personas[i].edad<=19){
            this.dinero+=2
        }else if(this.personas[i].edad>=11&&this.personas[i].edad<=17){
            this.dinero+=4
        }else if(this.personas[i].edad>=18){
            this.dinero+=6
        }
        this.personas.splice(i,1);
    }    
    console.log(`Total recaudado=${this.dinero}€`);
    this.dinero=0;
}

var cine=new Cine();
cine.ingresarPersonas();
cine.recaudarDinero();
