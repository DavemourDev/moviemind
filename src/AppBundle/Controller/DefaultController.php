<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Pelicula;
use AppBundle\Utils\Imdb;



class DefaultController extends Controller {

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request) {


        // replace this example code with whatever you need
        return $this->render('full-views/index.html.twig', [
                    'base_dir' => realpath($this->getParameter('kernel.root_dir') . '/..') . DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/buscar/{texto}", name="resultado")
     */
    public function buscarAction(Request $request) {
        //$busqueda = $request->get("buscar");

        
        
        $resultados = $this->getDoctrine()
                ->getRepository('AppBundle:Pelicula')
                ->findAll();
                //->find($busqueda);
        
        foreach($resultados as $r)
        {
            $r->setSource('Omdb');
            $r->fetch();
        }

        //$peliculas=[];
        
//        foreach($resultados as $r)
//        {
//            $p=new Pelicula();
//            $p->setTitulo($r->titulo);
//            $p->setImdb($r->imdb);
//            $peliculas[]=$p;
//        }

            return $this->render('full-views/resultados.html.twig', [
                        'peliculas' => $resultados,
            ]);
        
    }
    
    /**
     * @Route("/products/", name="products")
     */
    public function productsAction(Request $request) {
        //$busqueda = $request->get("buscar");

        $productos = $this->getDoctrine()
                ->getRepository('AppBundle:Producto')
                ->findAll();
                //->find($busqueda);
        
        $peliculas= $this->getDoctrine()
                ->getRepository('AppBundle:Pelicula')
                ->findAll();
        
        $ediciones= $this->getDoctrine()
                ->getRepository('AppBundle:Edicion')
                ->findAll();
        
        foreach($peliculas as $p)
        {
            $p->setSource('Omdb');
            $p->fetch();
        }

        //$peliculas=[];
        
//        foreach($resultados as $r)
//        {
//            $p=new Pelicula();
//            $p->setTitulo($r->titulo);
//            $p->setImdb($r->imdb);
//            $peliculas[]=$p;
//        }

            return $this->render('full-views/resultados.html.twig', [
                        'productos' => $productos,
                        'peliculas' => $peliculas,
                        'ediciones' => $ediciones,
            ]);
        
    }

    
    
}
