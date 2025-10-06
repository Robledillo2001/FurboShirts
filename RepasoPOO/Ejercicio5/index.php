<?php
    abstract class Empleado{
        public string $nombre;
        public string $dni;
        public float $salarioBase;
        private int $idEmp;
        public static $contador=0;

        public static array $empleados=[];
        public function __construct($nombre,$dni,$salarioBase){
            $this->nombre=$nombre;
            $this->dni=$dni;
            $this->salarioBase=$salarioBase;
            self::$contador+=1;
            $this->idEmp=self::$contador;
            self::$empleados[]=$this;
        }

        public function mostrarFila():string{
            return "<tr>
                        <td>".$this->idEmp."</td>
                        <td>".$this->nombre."</td>
                        <td>".$this->dni."</td>
                        <td>".$this->calcularSalario()."</td>
                    </tr>";
        }

        public static function mostrarTabla():void{
            echo "<table border='1'>
                <tr>
                    <th>ID DE EMPLEADO</th>
                    <th>NOMBRE</th>
                    <th>DNI</th>
                    <th>SALARIO BASE</th>
                </tr>";
            foreach(self::$empleados as $empleado){
                echo $empleado->mostrarFila();
            }
            echo "</table>";
        }
        abstract function calcularSalario():float;
    }

   class Vendedor extends Empleado {
        public function calcularSalario(): float {
            return $this->salarioBase + ($this->salarioBase * 0.10);
        }
    }

    class Gerente extends Empleado {
        public function calcularSalario(): float {
            return $this->salarioBase + 500;
        }
    }

    class Becario extends Empleado{
        public function calcularSalario():float{
            return $this->salarioBase;
        }
    }

    new Vendedor("Mariano","1234567A",1900.50);
    new Gerente("Bordalas","1234567A",3200.90);
    new Becario("Isi","1234567A",300.25);
    new Vendedor("Carla","1234567A",1200.10);
    new Gerente("Rigoberto","1234567A",800.76);
    new Becario("lola","1234567A",10.99);
Empleado::mostrarTabla();
echo "<h1>Empleados totales ".Empleado::$contador."</h1>";
?>