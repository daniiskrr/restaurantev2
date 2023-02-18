<?php
class Jamon extends producto{
    private $nombre_producto;
    private $tipo_jamon;
    private $oferta;
        
    public function __construct($id_producto,$tipo_producto,$tipo_jamon,$nombre_producto,$precio_unidad,$oferta){
        Parent::__construct($id_producto,$tipo_producto,$precio_unidad);
        $this->nombre_producto = $nombre_producto;
        $this->tipo_jamon = $tipo_jamon;
        $this->oferta = $oferta;
    }

    
    public function getTipo_jamon()
    {
        return $this->tipo_jamon;
    }

    public function setTipo_jamon($tipo_jamon)
    {
        $this->tipo_jamon = $tipo_jamon;
    }

    public function getNombre_producto()
    {
        return $this->nombre_producto;
    }

    public function setNombre_producto($nombre_producto)
    {
        $this->nombre_producto = $nombre_producto;
    }
 
    public function getOferta()
    {
        return $this->oferta;
    }

    public function setOferta($oferta)
    {
        $this->oferta = $oferta;

        return $this;
    }
}