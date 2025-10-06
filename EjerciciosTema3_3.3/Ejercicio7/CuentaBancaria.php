<?php
   class CuentaBancaria{
    public $saldo;
    public $titular;

    public function __construct(float $s,string $t){
        $this->titular=$t;
        $this->saldo=$s;
    }

    public function getSaldo(){
        return $this->saldo."<br>";
    }

    public function setSaldo($s){
        $this->saldo=$s;
    }


    public function getTitular(){
        return $this->titular."<br>";
    }

    public function setTitular($t){
        $this->titular=$t;
    }
   }
   class CuentaAhorro extends CuentaBancaria{
    public function __construct(float $s,string $t) {
        parent::__construct($s,$t);
    }
    public function retirar($retiro){
        $maximo=$this->saldo*0.50;
        if($retiro>$maximo){
            echo "No se puede retirar mas del 50%<br>";
        }else{
            $this->saldo-=$retiro;
            echo "Retiro exitoso de $retiro €<br>Total ahora=".$this->saldo."<br>";
        }
    }
   }
   $cuantabancaria=new CuentaAhorro(50000,"Carlos");

   echo $cuantabancaria->getSaldo();
   echo $cuantabancaria->getTitular();

   $cuantabancaria->retirar(2001);
?>
