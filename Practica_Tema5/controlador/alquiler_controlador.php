<?php
    require_once "modelo/alquilerModelo.php";
    require_once "modelo/clienteModelo.php";
    require_once "modelo/vehiculoModelo.php";

    class AlquilerControlador{
        public function inicio(){
            require_once "vista/inicio.php";
        }

        public function historial(){
            $alquiler=new Alquiler();//Creamos un objeto Alquiler
            $alquileres=$alquiler->obtenerAlquileres();//Llamamos al metodo para obtener un array de alquiler

            require_once "vista/historial.php";//Mostrara los alquileres
        }

        public function alquilarVehiculo(){
            $cliente=new Cliente();//Creamos un objeto cliente y un objeto vehiculo
            $vehiculo=new Vehiculo();

            if($_SERVER['REQUEST_METHOD']==="POST"){//Recogemos los datos del post
                $id_cliente=$_POST['id_cliente'];
                $id_vehiculo=$_POST['id_vehiculo'];
                $fecha=$_POST['fecha'];

                $alquiler=new Alquiler();//Creamos un objeto Alquiler
                $alquileres=$alquiler->alquilarVehiculo($id_cliente,$id_vehiculo,$fecha);//Llamamos al metodo alquilarVehiculo con los datos del post
                header("Location: index.php?action=historial");//Nos redirigira al historial
                exit;
            }
            $clientes=$cliente->obtenerClientes();//Creamos los clientes
            $vehiculos=$vehiculo->obtenerVehiculos();//Creamos los vehiculo

            require_once "vista/alquilar.php";//Se mostraran los datos en alquilar.php
        }

        public function devolverVehiculo(){
            if($_SERVER['REQUEST_METHOD']==='POST'){//Recogemos los datos del post
                $id_alquiler=$_POST['id_alquiler'];
                $id_vehiculo=$_POST['id_vehiculo'];

                $alquiler=new Alquiler();//Creamos un nuevo objeto alquiler
                $alquiler->devolverVehiculo($id_alquiler,$id_vehiculo);// Llamamos al metodo devolverVehiculo con los datos del post

                header("Location: index.php?action=historial");//Se redirigira al historial
            }
            require_once "vista/devolver.php";//Solo se mostrara un formulario con id alquiler y vehiculo
        }
    }
?>