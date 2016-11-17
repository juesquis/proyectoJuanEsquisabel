<?php

namespace App\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\DateTime;

class DefaultController extends Controller
{
    public function mostrarCorredoresAction()
    {
         $corredores = $this -> get('corredorrepository') -> corredoresDisponibles(); 
         //return new Response(implode("<br/>", $corredores));
           return $this->render("AppAppBundle:Default:index.html.twig",array('corredores'=>$corredores));

    }
    
    
     public function mostrarCarrerasAction()
    {
         $carrerasDisp= $this -> get('carrerarepository') -> buscarCarreraDisputadas(getdate());
         $carrerasNoDisp= $this -> get('carrerarepository') -> buscarCarreraNoDisputadas(getdate());
         return $this->render("AppAppBundle:Default:carreras.html.twig",array('carrerasDisp'=>$carrerasDisp,'carrerasNoDisp'=>$carrerasNoDisp));

    }
    
    public function buscarCarreraSlugAction($slug)
    {
         $carrera = $this -> get('carrerarepository') -> buscarCarreraSlug($slug); 
         $corredores=$this->get('participanterepository') ->buscarParticipantes($carrera);
         return $this->render("AppAppBundle:Default:carrera.html.twig",array('carrera'=>$carrera,'corredores'=>$corredores));

    }
    
    public function buscarOrganizacionSlugAction($slug)
    {
         $organizacion = $this -> get('organizacionrepository') -> buscarOrganizacionSlug($slug); 
         $carreras=$this->get('carrerarepository') ->buscarCarreraOrgNoDisputadas($organizacion,getDate());
         return $this->render("AppAppBundle:Default:organizacion.html.twig",array('organizacion'=>$organizacion,'carreras'=>$carreras));

    }
    
    public function adminAction(){
        return new Response('Página de administración');
    }
}
