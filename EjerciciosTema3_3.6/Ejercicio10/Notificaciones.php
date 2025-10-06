<?php
    abstract class Notificaciones{
        protected $estado;

        public function __construct(string $est="No enviado"){
            $this->estado=$est;
        }
        abstract public function enviar();
        abstract public function registrarEstado();
    }

    class Correo extends Notificaciones{
        public string $asunto;
        public string $cuerpo;
        public function __construct(string $a,string $c){
            parent::__construct();
            $this->asunto=$a;
            $this->cuerpo=$c;
        }

        public function enviar(){
            $this->estado="Enviado";
            return "Correo enviado con asunto: '$this->asunto' y cuerpo: '$this->cuerpo'<br>";
        }

        public function registrarEstado(){
            return "El estado del mensaje esta ".$this->estado;
        }
    }
    class SMS extends Notificaciones{
        public string $numeroTelefono;
        public string $mensaje;

        public function __construct(string $numero, string $mensaje) {
            parent::__construct();
            $this->numeroTelefono = $numero;
            $this->mensaje = $mensaje;
        }

        public function enviar(){
            $this->estado="Enviado";
            return "SMS enviado al número: $this->numeroTelefono con mensaje: '$this->mensaje'<br>";
        }

        public function registrarEstado(){
            return "El estado del mensaje esta ".$this->estado;
        }
    }

    class Push extends Notificaciones{
        public string $destinatario;
        public string $contenido;

        public function __construct(string $destinatario, string $contenido) {
            parent::__construct();
            $this->destinatario = $destinatario;
            $this->contenido = $contenido;
        }

        public function enviar(){
            $this->estado="Enviado";
            return "Notificación push enviada a: $this->destinatario con contenido: '$this->contenido'<br>";
        }

        public function registrarEstado(){
            return "El estado del mensaje esta ".$this->estado;
        }
    }
    // Crear y enviar una notificación de correo
    $correo = new Correo("Asunto de prueba", "Este es el cuerpo del correo.");
    echo $correo->enviar();
    echo $correo->registrarEstado() . "<br>";

    // Crear y enviar una notificación SMS
    $sms = new SMS("123456789", "Este es un mensaje SMS de prueba.");
    echo $sms->enviar();
    echo $sms->registrarEstado() . "<br>";

    // Crear y enviar una notificación Push
    $push = new Push("Usuario123", "Contenido de la notificación push.");
    echo $push->enviar();
    echo $push->registrarEstado() . "<br>";
?>
