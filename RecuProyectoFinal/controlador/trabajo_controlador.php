<?php
    require_once "modelo/trabajo_modelo.php";//Archivo con el objeto de TRabajo

    //Acceso a los archivos de FPDF
    require_once "fpdf/fpdf.php";
    
    //Excepciones del PHPMAILER
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    // Incluir las clases de PHPMailer
    require 'PHPMailer/PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer/PHPMailer.php';
    require 'PHPMailer/PHPMailer/SMTP.php';
    class Trabajo_Controlador{
        public function Fichar(){//Metodo de fichar del controlador
            $fichaje=new Trabajo();
            if($_SERVER['REQUEST_METHOD']==="POST"){
                $estado=$_POST['estado'];//Valor del estado del fichaje
                $id_usuario=$_SESSION['id_usuario'];

                echo $fichaje->registrarfichaje($id_usuario,$estado);

                setcookie("ultimoFichaje", $_SESSION['nombre'], time() + 3600, "/");//Cookie para recordar el ultimo fichaje
            }
            require_once "vista/fichar.php";//Archivo de la vista de fichar
        }

        public function verFichajes(){//Metodo de paginacion para ver los fichajes totales
            $fichaje=new Trabajo();

            $tamaño_pg=3;//Tamaño de la pagina
            $pagina=isset($_GET['pagina'])? (int)$_GET['pagina']:1;//Numero de la pagina donde este el usuario en el momento
            $inicio=($pagina - 1)*$tamaño_pg;

            $datos=$fichaje->consultarFichajes($inicio,$tamaño_pg);//Array de los fichajes
            $total=$fichaje->totalFichajes();//Fichajes en total

           
            $total_paginas=ceil($total['total']/$tamaño_pg);//tamaño total de las paginas
            

            require_once "vista/verFichajes.php";
        }

        public function Reportar(){//Funcion del controlador para añadir Reportes
            $trabajo=new Trabajo();//Objeto trabajo para acceder al metodo de añadir reportes
            $mail=new PHPMailer();//Objeto para poder enviar correos electronicos
            if($_SERVER['REQUEST_METHOD']==="POST"){//Recogida de los datos del formulario de reportes
                $id_usuario=$_SESSION['id_usuario'];
                $titulo=$_POST['titulo'];
                $desc=$_POST['desc'];

                $trabajo->reportar($id_usuario,$titulo,$desc);
                try{
                    //Configuracion del servidor SMTP de GMAIL
                    //$mail->SMTPDebug = 3; // o 3 para más detalle
                    $mail->isSMTP();
                    $mail->Host='smtp.gmail.com';
                    $mail->SMTPAuth=true;
                    $mail->Username='rl4845011@gmail.com';
                    $mail->Password='qdxj gljf voje mroe';
                    $mail->SMTPSecure=PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port=587;

                    //Configuracion del remitente y destinatario
                    $mail->setFrom($_SESSION['correo'],$_SESSION['nombre']);//Remitente
                    $mail->addAddress('lopezreinarobledilloruben@gmail.com','Administrador');//Destinatario del mensaje

                    //Contenido del correo
                    $mail->isHTML(true);
                    $mail->Subject = $titulo; // No pongas etiquetas HTML en el asunto
                    $mail->Body = "<p><strong>Reporte de: {$_SESSION['nombre']}</strong></p><p>{$desc}</p>";
                    $mail->AltBody = "Reporte de: {$_SESSION['nombre']} - {$desc}";

                    //Enviar el correo
                    $mail->send();
                    //var_dump($mail->ErrorInfo);
                    echo "Correo enviado correctamente";
                }catch(Exception $e){
                    die("Error al enviar el correo electronico".$e->getMessage());
                }
            }
            require_once "vista/Reportar.php";
        }

        public function eliminarReportes(){//Funcion para eliminar los reportes que se hayan completado
            $trabajo=new Trabajo();//Objeto trabajo
            if($_SERVER['REQUEST_METHOD']==="POST"){//Sacar los datos del form
                $id_reporte=$_POST['reporte'];

                echo $trabajo->eliminarReportes($id_reporte);//Llamada a la funcion de eliminar reporte
            }
            $reportes=$trabajo->estadoReportes();//Salida del modelo con el array de los reportes completados
            require_once "vista/eliminarReporte.php";
        }

        public function completarReportes(){
            $trabajo=new Trabajo();
            if($_SERVER['REQUEST_METHOD']==="POST"){
                $id_reporte=$_POST['reporte'];

                echo $trabajo->completarReportes($id_reporte);
            }
            $reportes=$trabajo->estadoReportes("pendiente");//Devolvera un array con los reportes que esten pendientes
            require_once "vista/completarReporte.php";
        }

        public function verReportes(){//Funcion del controlador para ver Reportes
            $reportes=new Trabajo();
            $tamaño_pg=3;//Tamaño de paginas
            $pagina=isset($_GET['pagina'])?(int)$_GET['pagina']:1;//Numero de la pagina
            $inicio=($pagina-1)*$tamaño_pg;
            $datos=$reportes->verReportes($inicio,$tamaño_pg);//Datos de las tareas de cada pagina
            $total=$reportes->totalReportes();//Total de las tareas que hay en la BSD

            $total_paginas=ceil($total['total']/$tamaño_pg);//Tamaño total de las paginas
            require_once "vista/verReportes.php";
        }

        public function verTareas(){//Funcion del controlador para ver Tareas
            $tareas=new Trabajo();
            $tamaño_pg=3;//Tamaño de paginas
            $pagina=isset($_GET['pagina'])?(int)$_GET['pagina']:1;//Numero de la pagina
            $inicio=($pagina-1)*$tamaño_pg;
            $datos=$tareas->verTareas($inicio,$tamaño_pg);//Datos de las tareas de cada pagina
            $total=$tareas->totalTareas();//Total de las tareas que hay en la BSD

            $total_paginas=ceil($total['total']/$tamaño_pg);//Tamaño total de las paginas
            
            require_once "vista/verTareas.php";
        }

        public function tareasEmp(){//Funcion para ver las tareas por empleado
            $tareas=new Trabajo();
            $tamaño_pg=3;//Tamaño de paginas
            $pagina=isset($_GET['pagina'])?(int)$_GET['pagina']:1;//Numero de la pagina
            $inicio=($pagina-1)*$tamaño_pg;

            if($_SERVER['REQUEST_METHOD'] === 'POST' &&isset($_POST['Completar'])){//Si se le da al boton de completar una tarea
                $completadas=array_map('intval',$_POST['completadas']??[]);//Sacar los checkbox marcados como completado
                if (!empty($completadas)) {
                    echo $tareas->actualizarTareas($completadas);
                }
            }

            $datos = $tareas->tareasEmp($_SESSION['id_usuario'], $inicio, $tamaño_pg);//Sacar las tareas segun la pagina que se encunetre
            $total = $tareas->totalTareasEmp($_SESSION['id_usuario']);//Total de las tareas que hay en la BSD
            $total_paginas = ceil($total / $tamaño_pg);//Total de paginas

            if($_SERVER['REQUEST_METHOD'] === 'POST' &&isset($_POST['Descargar'])){//Si se da al boton de descargar
                $datos_pdf=$tareas->descargarTareas($_SESSION['id_usuario']);//Sacamos los datos de todas las tareas para descargarlas en un pdf
                $pdf = new FPDF();
                $pdf->AddPage();

                // Imagen
                $pdf->Image('imagenes/cowork.jpg', 10, 10, 50);
                $pdf->SetFont('Arial', 'B', 14);
                $pdf->SetY(60); // Posicionar después de la imagen
                $pdf->Cell(190, 10, utf8_decode("Tareas de " . $_SESSION['nombre']), 0, 1, 'C');

                $pdf->Ln(10); // Espacio después del título
                $pdf->SetFont('Arial', 'B', 12);

                // Cabeceras y tamaños de columna
                $cabeceras = ['ID', 'Título', 'Descripción', 'Estado', 'Asignación', 'Entrega'];
                $tamaños = [10, 40, 60, 30, 25, 25]; //Tamaños de la pagina

                foreach ($cabeceras as $i => $col) {
                    $pdf->Cell($tamaños[$i], 10, utf8_decode($col), 1, 0, 'C');
                }
                $pdf->Ln();

                // Contenido de la tabla
                $pdf->SetFont('Arial', '', 7);
                foreach ($datos_pdf as $tarea) {
                    $pdf->Cell($tamaños[0], 8, $tarea['id'], 1);
                    $pdf->Cell($tamaños[1], 8, utf8_decode(substr($tarea['titulo'], 0, 30)), 1);
                    $pdf->Cell($tamaños[2], 8, utf8_decode(substr($tarea['descripcion'], 0, 40)) . (strlen($tarea['descripcion']) > 40 ? '...' : ''), 1);
                    $pdf->Cell($tamaños[3], 8, utf8_decode($tarea['estado']), 1);
                    $pdf->Cell($tamaños[4], 8, $tarea['fecha_asignacion'], 1);
                    $pdf->Cell($tamaños[5], 8, $tarea['fecha_entrega'], 1);
                    $pdf->Ln();
                }

                $pdf->Output('D','tareas_usuario_'.$_SESSION['nombre'].'.pdf');//Se descargara el archivo
                echo "Archivo descargado";
                setcookie("tareasPDF", $_SESSION['nombre'], time() + 3600, "/");//Cookie que se añade al descargar el PDF de tareas
            }

            require_once "vista/tareasEmpleado.php";
        }

        public function eliminarTareas(){//Funcion para eliminar las tareas completadas
            $trabajo=new Trabajo();//Objeto trabajo
            if($_SERVER['REQUEST_METHOD']==="POST"){//Sacar los datos del form
                $id_tarea=$_POST['tarea'];

                echo $trabajo->eliminarTarea($id_tarea);//Llamada a la funcion de eliminar tarea
            }
            $tareas=$trabajo->tareasSegunEstado();//Se mostraran las tareas completadas
            require_once "vista/eliminarTarea.php";
        }

        public function añadirTareas() {//Metodo donde el admin añade una tarea a un empleado
            $trabajo = new Trabajo();//Objeto trabajo
            if ($_SERVER['REQUEST_METHOD'] === "POST") {//Recogida de datos del post
                $id_emp = $_POST['id_emp'];
                $titulo = $_POST['titulo'];
                $descripcion = $_POST['desc'];
                $estado = $_POST['estado'];
                $asignacion = (new DateTime())->format('Y-m-d');
                $entrega = $_POST['entrega'];

                if($entrega<$asignacion){//Si la fecha de entrega de la tarea es menor a la de asignacion
                    echo "La fecha de entrega debe de ser posterior a la de hoy<br> Ponga otra fecha";
                }else{
                    $trabajo->añadirTarea($id_emp, $titulo, $descripcion, $estado, $asignacion, $entrega);//Llmar a funcion de añadirTarea
                    echo "Tarea Añadida correctamente.";
                    setcookie("tarea", $titulo, time() + 3600, "/");//Cookie con la ultima tarea añadida
                }
            }
            $empleados = $trabajo->verUsuarios();//Objeto que hace una select con todos los empleados
            require_once "vista/añadirTareas.php";
        }
    }
?>