<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


namespace App\CorredoresRiojaDomain\Repository\Infrastructure;
use App\CorredoresRiojaDomain\Repository\IParticipanteRepository;
use App\CorredoresRiojaDomain\Model\Carrera;
use App\CorredoresRiojaDomain\Model\Corredor;
use App\CorredoresRiojaDomain\Model\Organizacion;
use App\CorredoresRiojaDomain\Model\Participante;
use DateTime;
/**
 * Description of InMemoryParticipanteRepository
 *
 * @author juanesquisabel
 */
class InMemoryParticipanteRepository implements IParticipanteRepository{
    //put your code here
    public $participantes;
    public $carreras;
    function __construct() {
        $corredor1 = new Corredor("1234","Pepe", "Fernandez Díaz","pepe@gmail.com","1234","Av. Club Deportivo",new \DateTime('2000-01-01'));
        $corredor2 = new Corredor("16634543y","Juan", "Messi Martinez","juan@gmail.com","juan","Av. de la Paz",new \DateTime('1993-02-07'));
   
        $this ->carreras[] = new Carrera("1","carrera1", "descripción de la carrera 1",new \DateTime('2018-01-01'),"5",new \DateTime('2017-12-12'),"100","imagen1.jpg",new Organizacion("1","Organizacion1", "descripción de la organizacion 1","org1@gmail.com","org1"));
         $this ->carreras[] = new Carrera("2","carrera2", "descripción de la carrera 2",new \DateTime('2017-01-01'),"10",new \DateTime('2016-11-11'),"1000","iamgen2.jpg",new Organizacion("1","Organizacion1", "descripción de la organizacion 1","org1@gmail.com","org1"));
         $this ->carreras[] = new Carrera("3","carrera3", "descripción de la carrera 3",new \DateTime('2016-06-06'),"20",new \DateTime('2016-07-07'),"150","iamgen3.jpg",new Organizacion("1","Organizacion1", "descripción de la organizacion 1","org1@gmail.com","org1"));
         
         $organizacion= new Organizacion("1","Organizacion1", "descripción de la organizacion 1","org1@gmail.com","org1");
    
         $this->participantes[]=new Participante("33","03:28",$this->carreras[0],$corredor1);
         $this->participantes[]=new Participante("33","03:28",$this->carreras[1],$corredor2);
         $this->participantes[]=new Participante("33","03:28",$this->carreras[2],$corredor1);
         }    

    public function actualizarTiempoCorredorCarrera(\App\CorredoresRiojaDomain\Model\Participante $participante, Carrera $carrera, $tiempo) {
        
    }

    public function buscarCarreraDispCorredor(Corredor $corredor) {
        $carrerasNoDisp=[];
        $participante=[];
        foreach ($this->participantes as $par){
           if( $par->getCorredor()->getDNI()== $corredor->getDNI()){
               array_push($participante, $par);
            }
        }
        foreach ($participante as $par){
           if( $par->getCarrera()->getFechaCelebracion()<(new DateTime('now'))){
               array_push($carrerasNoDisp, $par->getCarrera());
            }
        }
        return $carrerasNoDisp;
    }

    public function buscarCarreraNoDispCorredor(Corredor $corredor) {
        $carrerasNoDisp=[];
        $participante=[];
        foreach ($this->participantes as $par){
           if( $par->getCorredor()->getDNI()== $corredor->getDNI()){
               array_push($participante, $par);
            }
        }
        foreach ($participante as $par){
           if( $par->getCarrera()->getFechaCelebracion()>(new DateTime('now'))){
               array_push($carrerasNoDisp, $par->getCarrera());
            }
        }
        return $carrerasNoDisp;
    }

    public function buscarParticipacionCarreras(Carrera $carrera, \App\CorredoresRiojaDomain\Repository\Participantes $participantes) {
        
    }

    public function buscarParticipantes(Carrera $carrera) {
        $participante=[];
        foreach ($this->participantes as $par){
           if( $par->getCarrera()->getId()== $carrera->getId()){
               array_push($participante, $par);
            }
        }
        return $participante;
    }

    public function comprobarCorredorCarrera(\App\CorredoresRiojaDomain\Model\Participante $participante, Carrera $carrera) {
        
    }

    public function eliminarParticipacion(Corredor $corredor, Carrera $carrera) {
        foreach ($this->participantes as $par){
           if(( $par->getCorredor()->getDNI()== $corredor->getDNI())&&($par->getCarrera()->getId()==$carrera->getId())){
               unset($par);
            }
        }
    }

    public function registrarParticipante(Corredor $corredor, Carrera $carrera) {
        $this->participantes[]=new Participante("59","03:18",$carrera,$corredor);
    }

}
