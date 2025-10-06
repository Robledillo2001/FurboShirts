
function Casilla(){//funcion que lo que nos hace es asignar el valor x, 1 o 2 segun el numero aleatorio que nos ponga

    let nR = Math.floor(Math.random() * 3);

    if(nR === 0){
        this.valor= "x"
    }else if(nR === 1){
        this.valor = 1;
    }else{
        this.valor = 2;
    }

}

function ColumnaQuiniela(){ //metemos el valor de la funcion anterior en el array que hemos declarado en este objeto
    this.casillas = []

    for(let i = 0; i <14; i++){
        let casilla = new Casilla();
        this.casillas.push(casilla);
    }

}

ColumnaQuiniela.prototype.Iguales = function(columna){ //atreves del prototype hacemos que todos los obj de tipo columnaquiniela tengan la funcion prototype, lo que hace es comprobar que las casillas no sean iguales

    let iguales = true;

    for(let i = 0; i < columna.casillas.length; i++){
        if(this.casillas[i] !== columna.casillas[i]){
            iguales = false;
            return iguales;
        }
    }

    return iguales;

}

ColumnaQuiniela.prototype.Obtener = function(){//Igua que antes hacemos que tengan este metodo todos los obj de tipo columnaquiniela lo que hace este metodo es separar los arrys por , y mostrarlo en pantalla
    let resultado="";
    for(let i=0;i<this.casillas.length;i++){
        resultado+=`${this.casillas[i].valor}, `
    }
    return resultado;
    /*let message = this.casillas.join(", ");
    return message;*/
}

function Quiniela(numColumnas){ //hacemos la clase quiniela que lo que nos hace es crear obj de tipo columnaquiniela segun el numero que le pasemos por parametros
    this.columnas = [];
    this.plenoAlQuince=new Casilla();

    for(let i = 0; i < numColumnas; i++){
        let columna = new ColumnaQuiniela();
        this.columnas.push(columna);
    }
}

//Metodo Mostrar QUiniela
Quiniela.prototype.Mostrar = function () {
    let resultado = "";
    for (let i = 0; i < this.columnas.length; i++) {
        resultado += `${this.columnas[i].Obtener()}\n`;
    }
    return resultado;
}

//probamos el ejercicio
let numero;
do {
    numero = parseInt(prompt("Número del 1-8"), 10);
} while (isNaN(numero) || numero < 1 || numero > 8);

const q1 = new Quiniela(numero);//Creacion de Objeto Quiniela
console.log(q1.Mostrar());//Mostramos la quiniela
//Probar Metodo Iguales
const c1=q1.columnas[0];
//Posiciones de las columnas de QUINIELA
const c2=q1.columnas[2];
console.log(c1.Iguales(c2))
