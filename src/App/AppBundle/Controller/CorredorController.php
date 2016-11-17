<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


namespace App\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\AppBundle\Form\CorredorType;

class CorredorController extends Controller {
    //put your code here
    
public function registroAction(Request $peticion){
        $form = $this -> createForm(CorredorType::class);
        $form->add('registro', SubmitType::class, array('label' => 'Registro'));
        $form ->handleRequest($peticion);
        if($form ->isValid()){
            // Recogemos el corredor que se ha registrado
            $corredor = $form ->getData();
// Codificamos la contraseña del corredor
            $encoder = $this -> get('security.encoder_factory') -> getEncoder($corredor);
            $password = $encoder -> encodePassword($corredor->getPassword(),$corredor -> getSalt());
            //$corredor -> saveEncodedPassword($password);
            // Lo almacenamos en nuestro repositorio de corredores
            $this -> get('corredorrepository') -> registraCorredor($corredor);
            // Creamos un mensaje flash para mostrar al usuario que 
              // se ha registrado correctamente
            $this -> get('session') -> getFlashBag()->add('info',
                    '¡Enhorabuena, ' . $corredor -> getName() . ' te has registrado en CorredoresPorLaRioja!');
                  // Reedirigimos al usuario a la portada
              return $this->render("AppAppBundle:Default:index.html.twig");
        }
        return $this -> render("AppAppBundle:Default:registro.html.twig",
                array('formulario' => $form -> createView()));        
    }
    
    function loginAction(Request $request)  {
    $authenticationUtils = $this->get('security.authentication_utils');

    // get the login error if there is one
    $error = $authenticationUtils->getLastAuthenticationError();

    // last username entered by the user
    $lastUsername = $authenticationUtils->getLastUsername();
    
    return $this->render(
        'AppAppBundle:security:login.html.twig',
        array(
            // last username entered by the user
            'last_username' => $lastUsername,
            'error'         => $error,
        )
    );
}

    function perfilAction(Request $peticion){
         $user = $this->getUser();
         $corredor= $this -> get('corredorrepository') -> buscaCorredor($user->getUsername());
        $form = $this -> createForm(CorredorType::class,$corredor);
        $form->add('registro', SubmitType::class, array('label' => 'Guardar'));
        $form ->handleRequest($peticion);
        if($form ->isValid()){
            // Recogemos el corredor que se ha registrado
            $corredor = $form ->getData();
// Codificamos la contraseña del corredor
            $encoder = $this -> get('security.encoder_factory') -> getEncoder($corredor);
            $password = $encoder -> encodePassword($corredor->getPassword(),$corredor -> getSalt());
            //$corredor -> saveEncodedPassword($password);
            // Lo almacenamos en nuestro repositorio de corredores
            $this -> get('corredorrepository') -> registraCorredor($corredor);
            // Creamos un mensaje flash para mostrar al usuario que 
              // se ha registrado correctamente
            $this -> get('session') -> getFlashBag()->add('info',
                    '¡Enhorabuena, ' . $corredor -> getName() . ' te has registrado en CorredoresPorLaRioja!');
                  // Reedirigimos al usuario a la portada
              return $this->render("AppAppBundle:Default:index.html.twig");
        }
        return $this -> render("AppAppBundle:Default:registro.html.twig",
                array('formulario' => $form -> createView()));     
    }
    
   function miscarrerasAction(Request $peticion){
       $user = $this->getUser();
       if($user!=null){
            $corredor= $this -> get('corredorrepository') -> buscaCorredor($user->getUsername());
             $carrerasNoDisp= $this -> get('participanterepository') -> buscarCarreraNoDispCorredor($corredor);
               $carrerasDisp= $this -> get('participanterepository') -> buscarCarreraDispCorredor($corredor);
             return $this->render("AppAppBundle:Default:misCarreras.html.twig",array('carrerasNoDisp'=>$carrerasNoDisp,'carrerasDisp'=>$carrerasDisp));
       }
       else{
                $authenticationUtils = $this->get('security.authentication_utils');

         // get the login error if there is one
         $error = $authenticationUtils->getLastAuthenticationError();

         // last username entered by the user
         $lastUsername = $authenticationUtils->getLastUsername();

         return $this->render(
             'AppAppBundle:security:login.html.twig',
             array(
                 // last username entered by the user
                 'last_username' => $lastUsername,
                 'error'         => $error,
             )
         );
       }
          
       }

   function inscribirCarreraSlugAction($slug){
       $user = $this->getUser();
       if($user!=null){
           $corredor= $this -> get('corredorrepository') -> buscaCorredor($user->getUsername());
           $carrera=$this->get ('carrerarepository') -> buscarCarreraSlug($slug);
           $this->get('participanterepository') -> registrarParticipante($corredor,$carrera);
           $carrerasNoDisp= $this -> get('participanterepository') -> buscarCarreraNoDispCorredor($corredor);
           $carrerasDisp= $this -> get('participanterepository') -> buscarCarreraDispCorredor($corredor);
             return $this->render("AppAppBundle:Default:misCarreras.html.twig",array('carrerasNoDisp'=>$carrerasNoDisp,'carrerasDisp'=>$carrerasDisp));
       }
       else{
                $authenticationUtils = $this->get('security.authentication_utils');

              // get the login error if there is one
              $error = $authenticationUtils->getLastAuthenticationError();

              // last username entered by the user
              $lastUsername = $authenticationUtils->getLastUsername();

              return $this->render(
                  'AppAppBundle:security:login.html.twig',
                  array(
                      // last username entered by the user
                      'last_username' => $lastUsername,
                      'error'         => $error,
                  )
              );
       }
   }    
       
   function desapuntarAction($slug){
        $user = $this->getUser();
         $corredor= $this -> get('corredorrepository') -> buscaCorredor($user->getUsername());
         $carrera=$this->get ('carrerarepository') -> buscarCarreraSlug($slug);
         $this->get('participanterepository') -> eliminarParticipacion($corredor,$carrera);
          $carrerasNoDisp= $this -> get('participanterepository') -> buscarCarreraNoDispCorredor($corredor);
            $carrerasDisp= $this -> get('participanterepository') -> buscarCarreraDispCorredor($corredor);
          return $this->render("AppAppBundle:Default:misCarreras.html.twig",array('carrerasNoDisp'=>$carrerasNoDisp,'carrerasDisp'=>$carrerasDisp));
   }

}
