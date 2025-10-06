<?php
    class Sesion{
        public function crearSesion(){
            session_start();
            $_SESSION['elemento']=[];
        }

        public function agregarElemento($elemento){
            $_SESSION['elemento'][]=$elemento;
        }

        public function devolverElemento($elemento){
            foreach ($_SESSION['elemento'] as $elementos) {
                if ($elementos === $elemento) {
                    return "$elementos"; // Si encuentra el elemento, lo devuelve
                }
            }
            return "NO se pudo encontrar el elemento"; // Si no encuentra el elemento después de recorrer todo
        }
        
        public function borrarElemento($elemento){
            foreach($_SESSION['elemento'] as $index=> $elementos){
                if($elementos===$elemento){
                    unset($_SESSION['elemento'][$index]); 
                }
            }
        }

        public function destruirSession(){
            unset($_SESSION['elemento']);
            session_destroy();
            return "Sesion cerrada";
        }
    }
    $sesion=new Sesion();
    $sesion->crearSesion();
    $sesion->agregarElemento("Nieve");
    $sesion->agregarElemento("Pablo");
    echo $sesion->devolverElemento("Pablo")."<br>";
    $sesion->borrarElemento("Nieve");
    echo $sesion->devolverElemento("Nieve")."<br>";
    echo $sesion->destruirSession()."<br>";
?>