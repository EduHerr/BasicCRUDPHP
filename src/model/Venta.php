<?php
namespace App\Model;

class Venta {
    public $id;
    public $nombre;
    public $apellidoPaterno;
    public $apellidoMaterno;
    public $fechaNacimiento;
    public $rfc;
    public $mail;
    public $celular;
    public $codigoPostal;
    public $calle;
    public $colonia;
    public $ciudad;
    public $estado;
    public $noExterior;
    public $productosFavoritos;
    public $beneficioElegido;

    public function __construct(
        $nombre,
        $apellidoPaterno,
        $apellidoMaterno,
        $fechaNacimiento,
        $rfc,
        $mail,
        $celular,
        $codigoPostal,
        $calle,
        $colonia,
        $ciudad,
        $estado,
        $noExterior,
        $productosFavoritos,
        $beneficioElegido
    ){
        $this->id = uniqid();
        $this->nombre = $nombre;
        $this->apellidoPaterno = $apellidoPaterno;
        $this->apellidoMaterno = $apellidoMaterno;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->rfc = $rfc;
        $this->mail = $mail;
        $this->celular = $celular;
        $this->codigoPostal = $codigoPostal;
        $this->calle = $calle;
        $this->colonia = $colonia;
        $this->ciudad = $ciudad;
        $this->estado = $estado;
        $this->noExterior = $noExterior;
        $this->productosFavoritos = $productosFavoritos;
        $this->beneficioElegido = $beneficioElegido;
    }
}
