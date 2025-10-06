<?php
session_start();

class Usuario{
    public $nombre;
    public $email;
    public $id;

    public static $usuarios = [];
    private static $contadorUsuarios = 0;

    public function __construct(string $nombre, string $email){
        $this->nombre = $nombre;
        $this->email = $email;

        self::$usuarios[] = $this;
        self::$contadorUsuarios += 1;
        $this->id = self::$contadorUsuarios;
    }
    //Acordarse de al deserializar se guarda la array con serialize y el paremetro del sesion
    public static function cargarUsuarios(){
        if(isset($_SESSION['usuarios'])){
            self::$usuarios = unserialize($_SESSION['usuarios']);
            // Actualizamos contador para evitar ids repetidos
            self::$contadorUsuarios = count(self::$usuarios);
        }
    }
    //Acordarse de al serializar se guarda la sesion con serialize y el paremetro del array
    public static function guardarUsuarios(){
        $_SESSION['usuarios'] = serialize(self::$usuarios);
    }

    protected function mostrarDatos(){//Funcion protegida para mostrar los datos de usuario
        return "<tr>
                    <td>".$this->id."</td>
                    <td>".$this->nombre."</td>
                    <td>".$this->email."</td>
                </tr>";
    }

    public static function mostrarUsuarios(){//FUncion estatica para mostrar usuarios
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>CORREO</th>
                </tr>";
        foreach(self::$usuarios as $usuario){//Recorremos el array de usuarios statico
            echo $usuario->mostrarDatos();//Llamada a funcion protegida
        }
        echo "<tr>
                <td colspan='3'>Hay registrados ".self::$contadorUsuarios." usuarios en total</td>
            </tr>
        </table>";
    }
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];

    Usuario::cargarUsuarios();//Llamada a funcion estatica para cargar usuarios

    $usuario = new Usuario($nombre, $email);//Crear objeto de usuario

    Usuario::guardarUsuarios();//Llamada a funcion estatica para guardar usuarios
}
?>

<html>
<head>
    <title>Serialización con usuarios</title>
</head>
<body>
    <form method="post">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" required><br>
        <label for="email">EMail</label>
        <input type="email" name="email" required><br>
        <button type="submit">Añadir Usuario</button>
    </form>
    <h2>Tabla de usuarios agregados</h2>
    <?=Usuario::mostrarUsuarios();//Llamada a la funcion estatica para mostrar los usuarios totales?>
    
</body>
</html>
