<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\CorredoresRiojaDomain\Model;
use Symfony\Component\Validator\Constraints as Assert;

class Corredor {


    private $DNI;
    private $Nombre;
    private $Apellidos;
    private $Email;
    private $Password;
    private $Salt;
    private $Direccion;
    private $FechaNacimiento;
    
    function __construct($DNI, $Nombre, $Apellidos, $Email, $Password, $Direccion, $FechaNacimiento) {
        $this->DNI = $DNI;
        $this->Nombre = $Nombre;
        $this->Apellidos = $Apellidos;
        $this->Email = $Email;
        $this->Password = $Password;
        $this->Direccion = $Direccion;
        $this->FechaNacimiento = $FechaNacimiento;
        $this->Salt = "";
    }

    
    function getDNI() {
        return $this->DNI;
    }

    function getNombre() {
        return $this->Nombre;
    }
    
    function getName() {
        return $this->Nombre;
    }

    function getApellidos() {
        return $this->Apellidos;
    }

    function getEmail() {
        return $this->Email;
    }

    function getPassword() {
        return $this->Password;
    }

    function getSalt() {
        return $this->Salt;
    }

    function getDireccion() {
        return $this->Direccion;
    }

    function getFechaNacimiento() {
        return $this->FechaNacimiento;
    }

    public function __toString() {
        
        return "DNI: ".$this->DNI." Nombre: ".$this->Nombre." Apellidos: ".$this->Apellidos." Email: ".$this->Email." Password: ".$this->Password." Salt: ".$this->Salt." Direccion: ".$this->Direccion." Fecha nacimiento: ".$this->FechaNacimiento->format('Y-m-d H:i:s');
    }
  /**  
    * @Assert\IsTrue(message = "La contraseña no puede ser la misma que tu nombre")
*/
public function isPasswordLegal(){
       return $this -> Nombre != $this -> Password;
}

/**
* @Assert\IsTrue(message = "Tienes que ser mayor de edad para registrarte")
*/
public function isMayorEdad(){
        $currentyear = getdate()['year'];
        $birthdayyear = ($this -> FechaNacimiento->format('Y'));
        $diff_years  = ($currentyear - $birthdayyear);
       return $diff_years >= 18;
}


}
    
