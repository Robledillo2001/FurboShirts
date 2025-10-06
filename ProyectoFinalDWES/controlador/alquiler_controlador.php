<?php
    require_once "modelo/alquilerModelo.php";
    require_once "modelo/cocheModelo.php";
    require_once "fpdf/fpdf.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    // Incluir las clases de PHPMailer
    require 'PHPMailer/PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer/PHPMailer.php';
    require 'PHPMailer/PHPMailer/SMTP.php';

    class AlquilerControlador{
        public function inicio(){
            require_once "vista/inicio.php";
        }

        public function historial(){
            $alquiler = new Alquiler();

            $tamaño = 3; // Registros por página
            $totalAlquileres = $alquiler->contarAlquileres();
            $totalPaginas = ceil($totalAlquileres / $tamaño);

            // Asegurar que la página esté en un rango válido
            $pagina = isset($_GET["pagina"]) ? (int)$_GET["pagina"] : 1;

            $inicio = ($pagina - 1) * $tamaño;

            $alquileres = $alquiler->obtenerAlquileres($inicio, $tamaño);

            //var_dump($alquileres);

            require_once "vista/historial.php";
        }

        private function enviarCorreo($id_alquiler,$id_coche,$precio,$fecha_hoy,$fecha_fin){//Funcion para enviar correo
            $mail=new PHPMailer(true);

                try{
                    $mail->isSMTP();
                    $mail->Host='smtp.gmail.com';
                    $mail->SMTPAuth=true;
                    $mail->Username='lopezreinarobledilloruben@gmail.com';
                    $mail->Password='yaxm pdrr hbbr tonk';
                    $mail->SMTPSecure=PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port=587;


                    $mail->setFrom("lopezreinarobledilloruben@gmail.com","Administracion");
                    $mail->addAddress($_SESSION['correo'],$_SESSION['usuario']);

                    $mail->isHTML(true);
                    $mail->Subject="Alquiler del coche Nº $id_alquiler de ".$_SESSION['usuario'];
                    $mail->Body='<h1>Coche con id de '.$id_coche.' alquilado a '.$_SESSION['usuario'].' El alquiler comienza desde el '.$fecha_hoy->format('Y-m-d') . 
                             " hasta el " . $fecha_fin . ".\n" . $precio.'</h1>';
                    $mail->AltBody = "Confirmación de alquiler\nHas alquilado el coche con éxito.";

                    $mail->send();
                    //echo "Mire en su correo para ver los datos de la factura";
                }catch(Exception $e){
                    echo "Error al enviar el correo: ".$mail->ErrorInfo;
                }  
        }

        private function generarPDF($id_alquiler,$id_coche, $fecha_fin, $fecha_hoy, $datos, $alquileres){//Funcion para generar PDFs
            $ruta_imagen = $datos['ruta']; // Imagen por defecto si no hay imagen en la BD

                // Verifica si la ruta de la imagen es válida. Si no es válida, usa una imagen por defecto.
                if (empty($ruta_imagen) || !file_exists($ruta_imagen)) {
                    // Ruta de la imagen por defecto
                    $ruta_imagen = 'coches/fondo.jpg';
                }

                // Generación del PDF
                $pdf = new FPDF('P', 'mm', 'A4');
                $pdf->AddPage();
                $pdf->SetFont('Arial', 'B', 15);

                // Título de la factura
                $pdf->Cell(200, 10, "Factura de alquiler Numero $id_alquiler - Coche ID: $id_coche a ".$_SESSION['usuario'], 1, 1, 'C');
                $pdf->Ln(5);

                // Configuración del texto
                $pdf->SetFont('Arial', 'B', 12);
                $pdf->SetXY(50, 50); // Define la posición para el texto

                $subtitulo="Factura del vehículo ".$datos['marca']." ".$datos['modelo']." con ID: $id_coche.";

                // Agregar texto (Factura del vehículo) sin que se sobreponga
                $pdf->Cell(100, 10,iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $subtitulo), 0, 'L');
                $pdf->ln(10);

                $texto="-Vehiculo alquilado: ".$datos['marca']." ".$datos['modelo']."\n-Fecha inicio: " . $fecha_hoy->format('Y-m-d') . "\n-Fecha final: $fecha_fin.\n-Precio diario:".$datos['precio']." €\n-$alquileres";

                $pdf->SetFont('Arial', '', 12);
                $pdf->MultiCell(100, 5,iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $texto), 0, 'L');

                // Salto de línea después del texto para evitar que la imagen lo tape
                $pdf->Ln(10);

                // Insertar la imagen después del texto
                $pdf->Image($ruta_imagen, 90,60,120); //Añadimos la imagen con la ruta que sa

                $pdf->Ln(25); // Un pequeño espacio antes de la siguiente página

                // Nueva página con términos y condiciones
                $pdf->AddPage();
                $pdf->SetFont('Arial', 'I', 12);
                $pdf->MultiCell(0, 10, "Alquiler de Coches S.A.\nNo nos responsabilizamos de los daños sufridos durante el alquiler.", 0, 'C');

                // Generar y enviar el PDF
                $pdf->Output('D', "Factura_Alquiler_".$datos['marca']."_".$datos['modelo']."_".$_SESSION['usuario'].".pdf");
        }

        public function alquilarCoche(){
            $coche=new Coche();
            session_start();
            if($_SERVER['REQUEST_METHOD']==="POST"){//Recogemos los datos del post
                $id_coche=$_POST['id_coche'];
                $fecha=$_POST['fecha'];
                $fecha_hoy=new DateTime();

                $alquiler=new Alquiler();//Creamos un objeto Alquiler
                $precioFinal=$alquiler->alquilarCoche($id_coche,$_SESSION['id_usuario'],$fecha);//Llamamos al metodo alquilarVehiculo con los datos del post
                $id_alquiler=$alquiler->obtenerIdAlquiler();
                
                
                //echo "Alquiler realizado con éxito.";
                $datos = $coche->obtenerDatos($id_coche); // Obtener datos de la BD
                // Añadir cookies
                $coche_cookie=$datos['marca']." ".$datos['modelo'];               
                $alquiler->añadirCookies($coche_cookie);
                
                $this->enviarCorreo($id_alquiler,$id_coche,$fecha,$fecha_hoy,$precioFinal);//Llamar a la funcion de enviar Correo

                $this->generarPDF($id_alquiler,$id_coche,$fecha,$fecha_hoy,$datos,$precioFinal);//Llamar a la funcion para generar PDFs

                if(isset($_COOKIE["Alquiler_".$_SESSION['usuario']])){
                    echo "<h3>Vehiculo ".$_COOKIE["Alquiler_".$_SESSION['usuario']]." alquilado</h3>";
                }
            }
            $coches = $coche->obtenerCoches();//Creamos los vehiculo

            require_once "vista/alquilar.php";//Se mostraran los datos en alquilar.php
        }

        public function devolverCoche(){
            session_start();
            $coche=new Coche();
            if($_SERVER['REQUEST_METHOD']==='POST'){//Recogemos los datos del post
                $id_alquiler=$_POST['id_alquiler'];
                $id_coche=$_POST['id_coche'];

                $alquiler=new Alquiler();//Creamos un nuevo objeto alquiler
                $fecha=$alquiler->obtenerFechaFinal($id_alquiler,$id_coche,$_SESSION['id_usuario']);

                $mail=new PHPMailer(true);

                echo "<h3>Coche devuelto</h3>";

                $datos = $coche->obtenerDatos($id_coche);//obtener datos del coche segun su id

                try{
                    $mail->isSMTP();
                    $mail->Host=("smtp.gmail.com");
                    $mail->SMTPAuth=true;
                    $mail->Username='lopezreinarobledilloruben@gmail.com';
                    $mail->Password='yaxm pdrr hbbr tonk';
                    $mail->SMTPSecure=PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port=587;

                    $mail->setFrom("lopezreinarobledilloruben@gmail.com","Administracion");
                    $mail->addAddress($_SESSION['correo'],$_SESSION['usuario']);

                    $mail->isHTML(true);
                    $mail->Subject="Devolucion de auto de ".$_SESSION['usuario'];
                    $mail->Body = "
                    <h2>Devolución de coche</h2>
                    <p>Estimado/a {$_SESSION['usuario']},</p>
                    <p>Confirmamos la devolución del coche con los siguientes detalles:</p>
                    <table>
                        <tr><td><strong>Marca:</strong></td><td>{$datos['marca']}</td></tr>
                        <tr><td><strong>Modelo:</strong></td><td>{$datos['modelo']}</td></tr>
                        <tr><td><strong>ID Coche:</strong></td><td>$id_coche</td></tr>
                    </table>
                    <p>Gracias por usar nuestro servicio de alquiler de coches.</p>
                    <p>Atentamente, <br> Alquiler de Coches S.A.</p>
                    ";

                    $mail->AltBody = "Devolución del coche: {$datos['marca']} {$datos['modelo']} por {$_SESSION['usuario']}.";

                    $mail->send();

                }catch(Exception $e){
                    echo "Error al enviar el correo: ".$mail->ErrorInfo;
                }
                $alquiler->devolverCoche($id_alquiler,$id_coche,$_SESSION['id_usuario']);// Llamamos al metodo devolverVehiculo con los datos del post
            }
            require_once "vista/devolver.php";//Solo se mostrara un formulario con id alquiler y vehiculo
        }

        public function añadirCoche() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['imagen'])) {
                $marca = $_POST['marca'];
                $modelo = $_POST['modelo'];
                $anio = $_POST['anio'];
                $precio = $_POST['precio'];
                $cantidad = $_POST['cantidad'];
                $imagen = $_FILES['imagen'];

                if(!file_exists("coches/")){
                    mkdir("coches/",0777,true);
                }
        
                // Verificar tamaño (máx. 20 MB)
                if ($imagen['size'] > 20 * 1024 * 1024) {
                    die("El archivo es demasiado grande.");
                }
        
                // Tipos de imagen permitidos
                $tiposDeImagen = ['image/png', 'image/jpeg', 'image/gif'];
                if (!in_array($imagen['type'], $tiposDeImagen)) {
                    die("Tipo de archivo no permitido.");
                }
        
                // Leer la imagen como binario para añadir a la tbala coches
                $imagenBinaria = file_get_contents($imagen['tmp_name']);
                if ($imagenBinaria === false) {
                    die("Error al leer la imagen en binario.");
                }

                $ruta_archivo="coches/".basename($imagen['name']);

        
                // Guardar en la base de datos
                $alquiler = new Alquiler();
                $alquiler->añadirCoches($marca, $modelo, $anio, $precio, $cantidad, $imagenBinaria,$ruta_archivo);
        
                echo "Vehículo añadido correctamente.";
            }
        
            require_once "vista/añadirCoches.php";
        }
        public function borrarCoche(){
            $alquiler=new Alquiler();
            $coche=new Coche();
            $coches=$coche->obtenerCoches();
            if($_SERVER['REQUEST_METHOD']==='POST'){
                $id_coche=$_POST['id_coche'];;
                if($id_coche){
                    $alquiler->borrarCoches($id_coche);
                }
                echo "Coche borrado:(";
            }
            require_once "vista/eliminarCoche.php";
        }

        public function verCoches(){
            $coche=new Coche();
            $tamaño=3;
            $pagina=isset($_GET['pagina'])?(int)$_GET['pagina']:1;
            $totalCoches=$coche->contarCoches();
            $inicio=($pagina-1)*$tamaño;
            $totalPaginas=ceil($totalCoches/$tamaño);


            $coches=$coche->obtenerCochesPag($inicio,$tamaño);
            require_once "vista/verCoches.php";
        }
    }
?>