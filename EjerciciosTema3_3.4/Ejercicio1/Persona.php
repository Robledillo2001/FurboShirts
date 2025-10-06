<?php
   class Persona{
    public string $nombre;
    protected int $edad;
    private string $dni;

    public function __construct(string $n,int $e,string $dni){
        $this->nombre=$n;
        $this->edad=$e;
        $this->dni=$dni;
    }

    public function mostrarDatos(){
        return "Nombre:".$this->nombre."<br>Edad:".$this->edad."<BR>DNI:".$this->dni;
    }
   }

   $persona=new Persona("Ruben",23,"04761267A");
   echo $persona->mostrarDatos();
?>
