<?php
    class CuentaAhorro{
        private $saldo;

        public function __construct(float $s)
        {
            $this->saldo=$s;
        }

        public function getSaldo(){
            return "El salario es de ".$this->saldo."€<br>";
        }

        public function setSaldo(float $s){
            $this->saldo=$s;
        }

        public function depositar($dinero){
            $this->saldo+=$dinero;
        }

        public function retirar($dinero){
            if($this->saldo<$dinero){
                echo "No se puede retirar $dinero € porque saldo es menor --->".$this->saldo."€<br>";
            }else{
                $this->saldo-=$dinero;
                echo "Se retiraron $dinero € ahora quedan".$this->saldo."€<br>";
            }
        }
    }
    $cuenta=new CuentaAhorro(3000);

    echo $cuenta->getSaldo();

    $cuenta->depositar(10);
    $cuenta->retirar(1945);
    $cuenta->retirar(1066);
?>
