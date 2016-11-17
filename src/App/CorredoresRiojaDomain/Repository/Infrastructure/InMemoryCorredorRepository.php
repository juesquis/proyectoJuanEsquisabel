<?php

namespace App\CorredoresRiojaDomain\Repository\Infrastructure;
use App\CorredoresRiojaDomain\Repository\ICorredorRepository;
use App\CorredoresRiojaDomain\Model\Corredor;

class InMemoryCorredorRepository implements ICorredorRepository{
    //put your code here
    private $corredores;
    
    public function __construct() {
         $this ->corredores[] = new Corredor("1234","Pepe", "Fernandez Díaz","pepe@gmail.com","1234","Av. Club Deportivo",new \DateTime('2000-01-01'));
         $this ->corredores[] = new Corredor("16634543y","Juan", "Messi Martinez","juan@gmail.com","juan","Av. de la Paz",new \DateTime('1993-02-07'));
         $this ->corredores[] = new Corredor("16756764o","Raúl", "García Rodriguez","raul@gmail.com","raul","Av. de Colón",new \DateTime('1988-06-09'));
    }
    
    public function corredoresDisponibles(){
        return $this->corredores;
    }

    public function actualizarCorredor(Corredor $corredor) {
        
    }

    public function buscaCorredor($dni) {
         foreach ($this->corredores as $cor){
            if($cor->getDNI()== $dni){
                return $cor;
            }
        }
    }

    public function eliminarCorredor(Corredor $corredor) {
        
    }

    public function registraCorredor(Corredor $corredor) {
         $this ->corredores[] = $corredor;
    }

    public function registrarCorredor(Corredor $corredor) {
        $this ->corredores[] = $corredor;
    }

}
