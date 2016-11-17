<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\CorredoresRiojaDomain\Repository\Infrastructure;
use App\CorredoresRiojaDomain\Repository\ICarreraRepository;
use App\CorredoresRiojaDomain\Model\Carrera;
use App\CorredoresRiojaDomain\Model\Organizacion;
use DateTime;
/**
 * Description of InMemoryCarreraRepository
 *
 * @author juanesquisabel
 */
class InMemoryCarreraRepository implements ICarreraRepository{
    private $carreras;
    
    public function __construct() {
         $this ->carreras[] = new Carrera("1","carrera1", "descripción de la carrera 1",new \DateTime('2018-01-01'),"5",new \DateTime('2017-12-12'),"100","imagen1.jpg",new Organizacion("1","Organizacion1", "descripción de la organizacion 1","org1@gmail.com","org1"));
         $this ->carreras[] = new Carrera("2","carrera2", "descripción de la carrera 2",new \DateTime('2017-01-01'),"10",new \DateTime('2016-11-11'),"1000","iamgen2.jpg",new Organizacion("1","Organizacion1", "descripción de la organizacion 1","org1@gmail.com","org1"));
         $this ->carreras[] = new Carrera("3","carrera3", "descripción de la carrera 3",new \DateTime('2016-06-06'),"20",new \DateTime('2016-07-07'),"150","iamgen3.jpg",new Organizacion("1","Organizacion1", "descripción de la organizacion 1","org1@gmail.com","org1"));
    }
    
    public function registrarCarrera(Carrera $carrera){
        
    }
    public function actualizarCarrera(Carrera $carrera){
        
    }
    public function eliminarCarrera(Carrera $carrera){
        
    }
    public function buscarCarreraSlug($slug){
        foreach ($this->carreras as $car){
            if($car->getSlug($car->getNombre())== $car->getSlug($slug)){
                return $car;
            }
        }
        return "no hay ninguna carrera con ese slug";
    }
    public function buscarCarreraOrgDisputadas(Organizacion $organizacion,$fecha){
        
    }
    public function buscarCarreraOrgNoDisputadas(Organizacion $organizacion,$fecha){
        $carrerasNoDisp=[];
        foreach ($this->carreras as $car){
           if($car->getFechaCelebracion()>(new DateTime('now')) && ($car->getOrganizacion()->getId() == $organizacion->getId())){
               array_push( $carrerasNoDisp, $car);
            }
        }
        return $carrerasNoDisp;
    }
    public function carrerasDisponibles(){
        return $this->carreras;
    }
    public function buscarCarreraDisputadas($fecha){
        $carrerasDisp=[];
        foreach ($this->carreras as $car){
           if($car->getFechaCelebracion()< (new DateTime('now'))){
               array_push( $carrerasDisp, $car);
            }
        }
        return $carrerasDisp;
    }
    public function buscarCarreraNoDisputadas($fecha){
        $carrerasNoDisp=[];
        foreach ($this->carreras as $car){
           if($car->getFechaCelebracion()>(new DateTime('now'))){
               array_push( $carrerasNoDisp, $car);
            }
        }
        return $carrerasNoDisp;
    }
}
