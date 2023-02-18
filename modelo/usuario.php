<?php

class usuario{
    public $id_usuario;
    public $correo;
    public $contrasena;
    public $nombre;
    public $apellidos;
    public $fecha_nacimiento;
    public $direccion;
    public $telefono;
    public $rol;

    public function __construct($id_usuario,$correo,$contrasena,$nombre,$apellidos,$fecha_nacimiento,$direccion,$telefono,$rol){
        $this->id_usuario = $id_usuario;
        $this->correo = $correo;
        $this->contrasena = $contrasena;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->fecha_nacimiento = $fecha_nacimiento;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->rol = $rol;
    }
    
    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    public function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    public function getContrasena()
    {
        return $this->contrasena;
    }

    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
 
    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    public function getFecha_nacimiento()
    {
        return $this->fecha_nacimiento;
    }

    public function setFecha_nacimiento($fecha_nacimiento)
    {
        $this->fecha_nacimiento = $fecha_nacimiento;
    }
 
    public function getDireccion()
    {
        return $this->direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function getRol()
    {
        return $this->rol;
    }

    public function setRol($rol)
    {
        $this->rol = $rol;
    }
}
?>