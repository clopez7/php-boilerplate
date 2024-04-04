<?php

class Cliente{
    private $nombre;
    private $apellidos;
    private $fecha_nacimiento;
    private $sexo;
    private $telefono;
    private $dni;
    private $email;
    private $password;
    private $imagen;

    /**
    * Cliente constructor.
    * @param $nombre
    * @param $apellidos
    * @param $fecha_nacimiento
    * @param $sexo
    * @param $telefono
    * @param $dni
    * @param $email
    * @param $password
    * @param $imagen
    */

    public function __construct($nombre, $apellidos, $fecha_nacimiento, $sexo, $telefono, $dni, $email, $password,$imagen){
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->fecha_nacimiento = $fecha_nacimiento;
        $this->sexo = $sexo;
        $this->telefono = $telefono;
        $this->dni = $dni;
        $this->email = $email;
        $this->password = $password;
        $this->imagen = $imagen;
    }
    /**
    * @return mixed
    */
    public function getNombre()
    {
    return $this->nombre;
    }

    /**
    * @param mixed $nombre
    */
    public function setNombre($nombre)
    {
    $this->nombre = $nombre;
    }

    /**
    * @return mixed
    */
    public function getApellidos()
    {
    return $this->apellidos;
    }

    /**
    * @param mixed $apellidos
    */
    public function setApellidos($apellidos)
    {
    $this->apellidos = $apellidos;
    }

    /**
    * @return mixed
    */
    public function getFechaNacimiento()
    {
    return $this->fecha_nacimiento;
    }

    /**
    * @param mixed $fecha_nacimiento
    */
    public function setFechaNacimiento($fecha_nacimiento)
    {
    $this->fecha_nacimiento = $fecha_nacimiento;
    }

    /**
    * @return mixed
    */
    public function getSexo()
    {
    return $this->sexo;
    }

    /**
    * @param mixed $sexo
    */
    public function setSexo($sexo)
    {
    $this->sexo = $sexo;
    }

    /**
    * @return mixed
    */
    public function getTelefono()
    {
    return $this->telefono;
    }

    /**
    * @param mixed $telefono
    */
    public function setTelefono($telefono)
    {
    $this->telefono = $telefono;
    }

    /**
    * @return mixed
    */
    public function getDni()
    {
    return $this->dni;
    }

    /**
    * @param mixed $dni
    */
    public function setDni($dni)
    {
    $this->dni = $dni;
    }

    /**
    * @return mixed
    */
    public function getEmail()
    {
    return $this->email;
    }

    /**
    * @param mixed $email
    */
    public function setEmail($email)
    {
    $this->email = $email;
    }

    /**
    * @return mixed
    */
    public function getPassword()
    {
    return $this->password;
    }

    /**
    * @param mixed $password
    */
    public function setPassword($password)
    {
    $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * @param mixed $imagen
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }
}