<?php
  class CuentaBancaria{
    protected int $saldo;
    public string $titular;

    public function __construct(int $s,string $t){
      $this->saldo=$s;
      $this->titular=$t;
    }

    public function getSaldo(){
      return $this->saldo;
    }

    public function getTitular(){
      return $this->titular;
    }
  }

  class CuentaAhorro extends CuentaBancaria{
    public function __construct(int $s,string $t){
      parent::__construct($s,$t);
    }

    public function depositar($saldoNuevo){
      $this->saldo+=$saldoNuevo;
    }
  }

  $cuenta=new CuentaAhorro(1200,"You");

  echo "Cuenta total-->".$cuenta->getSaldo()."€";
  echo "<br>Nuevo ingreso de 350€".$cuenta->depositar(350)."-->".$cuenta->getSaldo()."€";
?>
