<?php
   class InventarioTienda{
        public $productos=[];

    public function __construct(string $nombre,int $cantidad) {
        if($nombre!==null&&$cantidad!==null){
            $this->agregarProducto($nombre, $cantidad);
        }
    }
    public function agregarProducto(string $n,int $c){
        $this->productos[]=[
            "nombres"=>$n,
            "cantidades"=>$c
        ];
    }
    public function mostrarInventario(){
        foreach($this->productos as $productos){
            echo "Nombre:".$productos["nombres"]."---->Cantidad".$productos["cantidades"]."<br>";
        }
    }
   }
   $productos=[];
   $tienda=new InventarioTienda("Manzanas",10);

   $tienda->agregarProducto("Peras",69);

   $tienda->mostrarInventario();
?>
