<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Pelicula;


class DefaultController extends Controller {

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request) {


        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
                    'base_dir' => realpath($this->getParameter('kernel.root_dir') . '/..') . DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/buscar/", name="resultado")
     */
    public function buscarAction(Request $request) {
        $busqueda = $request->get("buscar");

        $resultados = $this->getDoctrine()
                ->getRepository('AppBundle:Pelicula')
                //->find($busqueda);
                ->find($busqueda);
        
        //$peliculas=[];
        
//        foreach($resultados as $r)
//        {
//            $p=new Pelicula();
//            $p->setTitulo($r->titulo);
//            $p->setImdb($r->imdb);
//            $peliculas[]=$p;
//        }

            return $this->render('default/provisional.html.twig', [
                        'peliculas' => $resultados,
            ]);
        
    }

}
