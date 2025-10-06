<?php
    interface Notificable{
        public function enviar($destinatario);
    }

    class Notificacion implements Notificable{
        protected string $destinatario;
        protected static int $contador=0;
        public $correoElectronico;
        public $titulo;
        public $cuerpo;
        public function __construct(string $correoElectronico, string $titulo,string $descripcion){
            $this->destinatario="";
            $this->correoElectronico=$correoElectronico;
            $this->titulo=$titulo;
            $this->cuerpo=$descripcion;
        }

        public static function incrementarTotalMensajes(){
             self::$contador+=1;
        }

         public function enviar($destinatario){
            self::incrementarTotalMensajes();
            $this->destinatario=$destinatario;
            return "Mensaje de {$this->correoElectronico} a {$this->destinatario}
                    <ul>
                        <li>".$this->titulo."</li>
                        <li>".$this->cuerpo."</li>
                    </ul>
                    ";
        }

        public static function getTotalEnviadas(){
            return"<h2>Total de mensajes ENVIOADOS:".self::$contador."</h2>";
        }
    }

    class EmailNotificacion extends Notificacion{
        public function enviar($destinatario){
            self::incrementarTotalMensajes();
            $this->destinatario=$destinatario;
            return "Mensaje de {$this->correoElectronico} a {$this->destinatario}
                    <ul>
                        <li>".$this->titulo."</li>
                        <li>".$this->cuerpo."</li>
                    </ul>
                    ";
        }
    }

    class SMSNotificacion extends Notificacion{
        public function enviar($destinatario){
            self::incrementarTotalMensajes();
            $this->destinatario=$destinatario;
            return "Mensaje de {$this->correoElectronico} a {$this->destinatario}
                    <ul>
                        <li>".$this->titulo."</li>
                        <li>".$this->cuerpo."</li>
                    </ul>
                    ";
        }
    }

    class PushNotificacion extends Notificacion{
        public function enviar($destinatario){
            self::incrementarTotalMensajes();
            $this->destinatario=$destinatario;
            return "Mensaje de {$this->correoElectronico} a {$this->destinatario}
                    <ul>
                        <li>".$this->titulo."</li>
                        <li>".$this->cuerpo."</li>
                    </ul>
                    ";
        }
    }
    // Ejemplo de uso:
    $email = new EmailNotificacion("admin@ejemplo.com", "Bienvenido", "Gracias por unirte.");
    echo $email->enviar("juan@example.com");

    $sms = new SMSNotificacion("noreply@ejemplo.com", "Código de acceso", "Tu código es 1234.");
    echo $sms->enviar("555123456");

    echo $email->enviar("juan@example.com");

    $push = new PushNotificacion("noreply@ejemplo.com", "Código de acceso", "Tu código es 1234.");
    echo $push->enviar("555123456");

    echo Notificacion::getTotalEnviadas();
?>