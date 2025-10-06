<?php
    abstract class Podcast{//Clase abstracta de Podcast
        public $titulo;
        public $descripcion;
        public $episodiosAsociados=[];//Array de Episodios

        public function __construct(string $titulo,string $descripcion){//Constructor de la clase
            $this->titulo=$titulo;
            $this->descripcion=$descripcion;
        }
        //Metodos abstractos para las clases hijas
        abstract public function añadirEpisodio(Episodio $episodio);
        abstract public function obtenerInformacion();
    }

    class PodcastEntrevista extends Podcast{//Clase para las entrevistas que es hija de la clase Podcast
        public $invitado;

        public function __construct(string $titulo,string $descripcion,string $invitado=""){//Constructor de Entrevista. Se deja el invitado vacio por defecto para modificarlo mas trade al añadir Episodios
            parent::__construct($titulo,$descripcion);//Llamada al constructor Padre
            $this->invitado=$invitado;
        }

        public function setInvitado($invitado){//Metodo para cambiar el nombre de invitado
            $this->invitado=$invitado;
        }

        public function obtenerInformacion(){//Obtener informacion del podcast
            $informacion="<table border='1' class='table-container'>";
            $informacion .= "
            <tr>
                <th>Titulo Podcast: " . $this->titulo . "</th>
                <th colspan='5'>Descripcion: " . $this->descripcion . "</th>
            </tr>";
            foreach($this->episodiosAsociados as $index => $episodio){
                $informacion.="<tr>";
                $informacion .= "<td>Episodio " . ($index + 1) . ":</td>" .
                                "<td>Titulo: " . $episodio["titulo"] . "</td>" .
                                "<td>Duracion: " . $episodio['duracion'] . " minutos</td>" .
                                "<td>Invitado: " . $episodio['invitado'] . "</td>" .
                                "<td>Fecha: " . $episodio['fecha']->format('Y-m-d') . "</td>";

                                $informacion .="<td> Escuchado:".($episodio['escuchado'] ? "Sí" : "No")."</td>";//Si escuchado es true muestra Si-False No
                $informacion.="</tr>";
            }
            $informacion.="</table><br>";
            return $informacion;
        }

        public function añadirEpisodio(Episodio $episodio){//Añadir episodios al podcast Se añade un objeto de tipo Episodio
            $this->episodiosAsociados[]=[
                "titulo"=>$episodio->titulo,
                "duracion"=>$episodio->duracion,
                "fecha"=>$episodio->fecha,
                "invitado"=>$this->invitado,
                "escuchado"=>false
            ];
        }
    }

    class PodcastDocumental extends Podcast{//Clase para los documentales que es hija de la clase Podcast
        public $temaPrincipal;

        public function __construct(string $titulo,string $descripcion,string $temaPrincipal=""){//Constructor de Entrevista. Se deja el Tema Principal vacio por defecto para modificarlo mas trade al añadir Episodios
            parent::__construct($titulo,$descripcion);//Llamada al constructor Padre
            $this->temaPrincipal=$temaPrincipal;
        }

        public function setTema($tema){//Modificar el terma de conversacion
            $this->temaPrincipal=$tema;
        }

        public function obtenerInformacion(){//Obtener los datos del podcast
            $informacion="<table border='1' class='table-container'>";
            $informacion .= "
            <tr>
                <th>Titulo Podcast: " . $this->titulo . "</th>
                <th colspan='5'>Descripcion: " . $this->descripcion . "</th>
            </tr>";
            foreach($this->episodiosAsociados as $index => $episodio){
                $informacion.="<tr>";
                $informacion .= "<td>Episodio " . ($index + 1) . ":</td>" .
                                "<td>Titulo: " . $episodio["titulo"] . "</td>" .
                                "<td>Duracion: " . $episodio['duracion'] . " minutos</td>" .
                                "<td>Tema Principal: " . $episodio['tema'] . "</td>" .
                                "<td>Fecha: " . $episodio['fecha']->format('Y-m-d') . "</td>";
                                $informacion .="<td> Escuchado:".($episodio['escuchado'] ? "Sí" : "No")."</td>";//Si escuchado es true muestra Si-False No
                $informacion.="</tr>";
            }
            $informacion.="</table><br>";
            return $informacion;
        }

        public function añadirEpisodio(Episodio $episodio){//Añadir episodios Se añade un objeto de tipo Episodio
            $this->episodiosAsociados[]=[
                "titulo"=>$episodio->titulo,
                "duracion"=>$episodio->duracion,
                "fecha"=>$episodio->fecha,
                "tema"=>$this->temaPrincipal,
                "escuchado"=>false
            ];
        }
    }

    class PodcastCharla extends Podcast{//Clase para las charlas que es hija de la clase Podcast
        public $ponente;

        public function __construct(string $titulo,string $descripcion,string $ponente=""){//Constructor de Entrevista. Se deja el ponente vacio por defecto para modificarlo mas trade al añadir Episodios
            parent::__construct($titulo,$descripcion);//Llamada al constructor padre
            $this->ponente=$ponente;
        }

        public function setPonente($ponente){//Metodo para cambiar el ponente
            $this->ponente=$ponente;
        }

        public function obtenerInformacion(){//Obtener informacion del podcast
            $informacion="<table border='1' class='table-container'>";
            $informacion .= "
            <tr>
                <th>Titulo Podcast: " . $this->titulo . "</th>
                <th colspan='5'>Descripcion: " . $this->descripcion . "</th>
            </tr>";
            foreach($this->episodiosAsociados as $index => $episodio){
                $informacion.="<tr>";
                $informacion .= "<td>Episodio " . ($index + 1) . ":</td>" .
                                "<td>Titulo: " . $episodio["titulo"] . "</td>" .
                                "<td>Duracion: " . $episodio['duracion'] . " minutos</td>" .
                                "<td>Ponente: " . $episodio['ponente'] . "</td>" .
                                "<td>Fecha: " . $episodio['fecha']->format('Y-m-d') . "</td>";
                                $informacion .="<td> Escuchado:".($episodio['escuchado'] ? "Sí" : "No")."</td>";//Si escuchado es true muestra Si-False No
                $informacion.="</tr>";
            }
            $informacion.="</table><br>";
            return $informacion;
        }

        public function añadirEpisodio(Episodio $episodio){//Añadir episodios Se añade un objeto de tipo Episodio
            $this->episodiosAsociados[]=[
                "titulo"=>$episodio->titulo,
                "duracion"=>$episodio->duracion,
                "fecha"=>$episodio->fecha,
                "ponente"=>$this->ponente,
                "escuchado"=>false
            ];
        }
    }

    class Episodio{//Clase para los episodios
        public $titulo;
        public $duracion;
        public $fecha;

        public function __construct(string $titulo,int $duracion,DateTime $fecha) {//COnstructor de episodios
            $fechahoy=new DateTime();
            $this->titulo = $titulo;
            $this->duracion = $duracion;
            // Si la fecha del episodio es en el pasado, se ajusta a la fecha de hoy si no se ajustara a la fecha que hallamos seleccionado
            $this->fecha = ($fecha <= $fechahoy) ? $fechahoy : $fecha;
            
        }
    }

    class GestorPodcats{//Clase del Gestor de Podcast
        public $podcast=[];//Array de podcast

        public function añadirPodcast(Podcast $podcast){//Añadir podcast al array
            $this->podcast[]=$podcast;//Se añade un objeto de tipo podcast
        }

        public function listarPodcast(){//Lista los podcast disponibles en el gestor
            $informacionPodcast=[];//Se crea un array de la informacion del array de Podcast
            foreach($this->podcast as $podcast){
                $informacionPodcast[]=$podcast->obtenerInformacion();//Llamada al metodo de Podcast obtenerInformacion()
            }
            return $informacionPodcast;//Devolver informacion
        }
    }
?>
