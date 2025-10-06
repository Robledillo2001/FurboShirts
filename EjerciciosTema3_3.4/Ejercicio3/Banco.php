<?php
   class Banco{
    public string $nombre;
    protected float $saldo;

    public function __construct(string $n,float $s){
        $this->nombre=$n;
        $this->saldo=$s;        
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre(string $n){
        $this->nombre=$n;
    }

    public function getSaldo(){
        return $this->saldo;
    }

    public function setSaldo(float $s){
        $this->saldo=$s;
    }
   }

   class BancoLocal extends Banco{
    public function __construct(string $n,float $s){
        parent::__construct($n,$s);
    }
    public function mostrarSalario(){
        return "Salario total es igual a ".$this->saldo;
    }
   }
   $bLocal=new BancoLocal("Liberbank",1209090);

   //echo $bLocal->getSaldo();
   echo $bLocal->mostrarSalario()."€";
?>
