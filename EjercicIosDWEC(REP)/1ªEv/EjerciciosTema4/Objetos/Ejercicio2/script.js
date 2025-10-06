function Coordenadas(x,y){
    if(isNaN(x)&&isNaN(y)){
        this.x=0;
        this.y=0;
    }else{
        this.x=x;
        this.y=y;
    }
};

Coordenadas.prototype.cambiar=function(x,y){
    if(isNaN(x)&&isNaN(y)){
        this.x=0;
        this.y=0;
    }else{
        this.x=x;
        this.y=y;
    }
    console.log(`Valor de las coordenadas cambio---->(${this.x},${this.y})`);
};

Coordenadas.prototype.copia=function(){
    console.log(`Valor de las coordenas--->(${this.x},${this.y})`)
};

Coordenadas.prototype.iguales=function(co){
    if(this.x===co.x&&this.y===co.y){
        console.log(`El valor de las dos coordenadas son iguales---->(${co.x},${co.y})`);
    }else{
        console.log(`El valor de las dos coordenadas son no iguales---->(${co.x},${co.y})<--------(${this.x},${this.y})`);
    }
};

Coordenadas.prototype.suma = function(co) {
    if (co instanceof Coordenadas) {
        return new Coordenadas(this.x + co.x, this.y + co.y);
    } else {
        // Si no recibe un punto, devuelve una copia del actual.
        return new Coordenadas(this.x, this.y);
    }
};

Coordenadas.prototype.toString=function(){
    console.log(`(${this.x},${this.y})`);
};

// Ejemplo de uso:
let punto1 = new Coordenadas(2, 3);
let punto2 = new Coordenadas(4, 5);

// Cambiar coordenadas de punto1
punto1.cambiar(4, 5);

// Copiar coordenadas de punto1
punto1.copia();

// Verificar si punto1 y punto2 son iguales
punto1.iguales(punto2);

// Sumar punto1 y punto2
let sumaPuntos = punto1.suma(punto2);
sumaPuntos.copia(); // Debería mostrar (11, 13)