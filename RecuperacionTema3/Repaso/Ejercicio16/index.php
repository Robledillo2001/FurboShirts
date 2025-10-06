<?php
abstract class DispositivoElectronico {
    protected $estado;
    public $estadoString;

    public function __construct() {
        $this->estado = false;
        $this->estadoString = $this->estado ? "Dispositivo encendido" : "Dispositivo Apagado";
    }

    abstract public function encender();
    abstract public function apagar();
}

class Telefono extends DispositivoElectronico {
    public function __construct() {
        parent::__construct();
    }

    public function encender() {
        $this->estado = true;
        $this->estadoString = "Dispositivo encendido";
        return $this->estadoString;
    }

    public function apagar() {
        $this->estado = false;
        $this->estadoString = "Dispositivo Apagado";
        return $this->estadoString;
    }

    public function realizarLlamada($numeroT) {
        if ($this->estado === true) {
            if (is_numeric($numeroT) && strlen($numeroT) <= 9) {
                return "Llamando a $numeroT";
            }
            return "Número inválido";
        }
        return "El teléfono está apagado. Enciéndelo para realizar llamadas.";
    }
}

class Ordenador extends DispositivoElectronico {
    public function __construct() {
        parent::__construct();
    }

    public function encender() {
        $this->estado = true;
        $this->estadoString = "Dispositivo encendido";
        return $this->estadoString;
    }

    public function apagar() {
        $this->estado = false;
        $this->estadoString = "Dispositivo Apagado";
        return $this->estadoString;
    }

    public function conectarInternet() {
        if ($this->estado === true) {
            return "Conectando a una red de Internet";
        }
        return "El ordenador está apagado. Enciéndelo para conectarte a Internet.";
    }
}

class Tableta extends DispositivoElectronico {
    public function __construct() {
        parent::__construct();
    }

    public function encender() {
        $this->estado = true;
        $this->estadoString = "Dispositivo encendido";
        return $this->estadoString;
    }

    public function apagar() {
        $this->estado = false;
        $this->estadoString = "Dispositivo Apagado";
        return $this->estadoString;
    }
}


    $telefono=new Telefono();
    echo $telefono->realizarLlamada(969125581)."<br>";
    echo $telefono->encender()."<br>";
    echo $telefono->realizarLlamada(969125581)."<br>";
    echo $telefono->apagar()."<br>";

    $ordenador=new Ordenador();
    echo $ordenador->conectarInternet()."<br>";
    echo $ordenador->encender()."<br>";
    echo $ordenador->conectarInternet()."<br>";
    echo $ordenador->apagar()."<br>";
?>