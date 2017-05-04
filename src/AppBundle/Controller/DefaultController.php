<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        
        
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
    
    /**
     * @Route("/buscar/{busqueda}", name="busqueda")
     */
    public function buscarAction(Request $request)
    {
        $titulo= new $request->get("buscar");
        $resultados = $this->getDoctrine() 
                ->getRepository('AppBundle:Pelicula') 
                ->find($titulo);
        $pelicula->setTitulo($titulo);
               
        if (!$titulo){
            $sinresultado="No hay titulo seleccionado";
        return $this->render('navigation/busqueda.html.twig', [
            'busqueda'=>$sinresultado,
        ]);    
        } else {
        $Peliculas=[];
        $Peliculas .= $get->getId();
        $Peliculas .= $get->getTitle();
        $Peliculas .= $get->getImdb();
    
        
            return $this->render('navigation/busqueda.html.twig', [
            'busqueda'=>$titulo, 
            ]);
        }
   }
}
