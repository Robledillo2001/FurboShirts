function Jugador(){
    this.fuerza=1;

    this.incrementarFuerza=function(){
        this.fuerza+=1;
        alert("Fuerza Incrementada");
    }

    this.consultarFuerza=function(){
        console.log(`La fuerza total del jugador es de ${this.fuerza}`);
    }
}

let jugador=new Jugador();

jugador.incrementarFuerza();
jugador.incrementarFuerza();
jugador.incrementarFuerza();
jugador.incrementarFuerza();

jugador.consultarFuerza();