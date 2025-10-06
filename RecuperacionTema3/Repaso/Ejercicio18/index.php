<?php
abstract class Notificaciones {
    public $estado;

    public function __construct() {
        $this->estado = "No enviado";
    }

    abstract public function enviar();
    abstract public function registrarEstado($estado);
}

class CorreoElectronico extends Notificaciones {
    public $asunto;
    public $cuerpo;

    public function __construct(string $a, string $c) {
        parent::__construct();
        $this->asunto = $a;
        $this->cuerpo = $c;
    }

    public function enviar() {
        if ($this->estado === "Enviado") {
            return "Mensaje enviado\n";
        } else {
            return "Debes registrar el estado como 'Enviado' antes de enviar el mensaje\n";
        }
    }

    public function registrarEstado($estado) {
        $this->estado = $estado ? "Enviado" : "No enviado";
    }
}

class SMS extends Notificaciones {
    public $numero;

    public function __construct(int $n) {
        parent::__construct();
        if (is_numeric($n) && $n >= 900000000 && $n <= 999999999) {
            $this->numero = $n;
        } else {
            throw new Exception("Número inválido. Debe estar entre 900000000 y 999999999.");
        }
    }

    public function registrarEstado($estado) {
        $this->estado = $estado ? "Enviado" : "No enviado";
    }

    public function enviar() {
        if ($this->estado === "Enviado") {
            return "Mensaje enviado\n";
        } else {
            return "Debes registrar el estado como 'Enviado' antes de enviar el mensaje\n";
        }
    }
}

class Push extends Notificaciones {
    public $destinatario;

    public function __construct(string $d) {
        parent::__construct();
        $this->destinatario = $d;
    }

    public function enviar() {
        return "Mensaje enviado\n";
    }

    public function registrarEstado($estado) {
        $this->estado = $estado ? "Enviado" : "No enviado";
    }
}

// Pruebas
$correo = new CorreoElectronico("Asunto importante", "Cuerpo del mensaje");
$correo->registrarEstado(false);
echo $correo->enviar()."<br>"; // Salida: "Debes registrar el estado como 'Enviado' antes de enviar el mensaje"

$correo->registrarEstado(true);
echo $correo->enviar()."<br>"; // Salida: "Mensaje enviado"

$sms = new SMS(900123456);
$sms->registrarEstado(true);
echo $sms->enviar()."<br>"; // Salida: "Mensaje enviado"

$push = new Push("Usuario1");
$push->registrarEstado(true);
echo $push->enviar()."<br>"; // Salida: "Mensaje enviado"
?>
