<?php
    class CuentaBancaria{
        protected $saldo;
        public $titular;
        public function __construct(float $s,string $p){
            $this->saldo=$s;
            $this->titular=$p;
        }
    }

    class CuentaAhorro extends CuentaBancaria{
        public function depositar($cantidad){
            $this->saldo+=$cantidad;
            return "La cantidad ahora es de ".$this->saldo;
        }
    }

    $cuenta=new CuentaAhorro(120,"Ruben");

    echo $cuenta->depositar(300);
?>