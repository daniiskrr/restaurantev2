<?php
include_once 'producto.php';
class Bocadillo extends producto{
    private $nombre_producto;
    private $tamanyo;
    private $oferta;
        
    public function __construct($id_producto,$tipo_producto,$tamanyo,$nombre_producto,$precio_unidad,$oferta){
        Parent::__construct($id_producto,$tipo_producto,$precio_unidad);
        $this->nombre_producto = $nombre_producto;
        $this->oferta = $oferta;
        $this->tamanyo = $tamanyo;
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
    }

    /**
     * Get the value of tamanyo
     */ 
    public function getTamanyo()
    {
        return $this->tamanyo;
    }

    /**
     * Set the value of tamanyo
     *
     * @return  self
     */ 
    public function setTamanyo($tamanyo)
    {
        $this->tamanyo = $tamanyo;

        return $this;
    }
}
?>
