<?php
    class Electrodomestico{
        private $precio;

        public function __construct(int $p){
            $this->precio=$p;
        }

        public function getPrecio(){
            return $this->precio."<br>";
        }

        public function setPrecio(int $p){
            if($p>50){
                $this->precio+=$p;
                echo "El precio ha cambiado <br>";
            }else{
                echo "El precio debe ser mayor a 50 <br>$p invalida<br>";
            }
        }
    }

    $ele=new Electrodomestico("45");

    $ele->setPrecio("100");

    $resultado=$ele->getPrecio();

    echo "$resultado";
?>
