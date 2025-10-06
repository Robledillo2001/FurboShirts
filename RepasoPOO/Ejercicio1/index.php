<?php
    class GestionSesiones{
        public function crearSesion(){//Crea la sesion y array de sesion mediante un metodo
            session_start();
            return "Sesion creada con exito<br>";
        }

        public function añadirElemento(string $elemento){//Añade un elemento al array de sesion
            if(!isset($_SESSION['elementos'])){
                $_SESSION["elementos"]=[];
            }
           $_SESSION["elementos"][]=$elemento;
           return "Elemento Añadido<br>";
        }

        public function devolverElemento(string $elemento){//Devuelve un elemento al array de sesion
            foreach($_SESSION['elementos']as $elementos){
                if($elementos===$elemento){
                    return $elementos."<br>";
                }
            }
            return "No se encontro $elemento <br>";
        }

        public function borrarElemento(string $elemento){//Borra un elemento al array de sesion
            foreach($_SESSION['elementos']as $index=>$elementos){
                if($elementos===$elemento){
                    unset($_SESSION['elementos'][$index]);
                    return "Elemento eliminado<br>";
                }
            }
            return "No hay $elemento para borrar porque no existe <br>";
        }

        public function destruirSesion(){//Destruye la sesion
            session_destroy();
            return "Sesion Destruida<br>";
        }
    }
    //Crear Objeto de Gestion de Sesiones
    $sesion=new GestionSesiones();
    //Crear sesion con el metodo del objeto
    echo $sesion->crearSesion();
    //Añadir elementos en sesion
    echo $sesion->añadirElemento("Hola");
    echo $sesion->añadirElemento(3);
    echo $sesion->añadirElemento("Tolo");
    //Devolver Elementos
    echo $sesion->devolverElemento(3);
    //Borrar elemento
    echo $sesion->borrarElemento(3);
    //Destruir sesion
    echo $sesion->destruirSesion();
    //Si no existen elementos mostrara un mensaje
    echo $sesion->devolverElemento(3);
    echo $sesion->borrarElemento(3);
?>