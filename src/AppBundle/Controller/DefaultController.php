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
        //Landing Page
        return $this->render('full-views/index.html.twig');
    }


    /**
     * @Route("/moreInfo/{imdb}", name="info")
     */
    public function moreInfoAction(Request $request) {

        $productos = $this->getDoctrine()
                ->getRepository('AppBundle:Producto')
                ->findAll();

        $peliculas = $this->getDoctrine()
                ->getRepository('AppBundle:Pelicula')
                ->findAll();

        $ediciones = $this->getDoctrine()
                ->getRepository('AppBundle:Edicion')
                ->findAll();

        foreach ($peliculas as $p) {
            $p->setSource('Omdb');
            $p->fetch();
        }

        return $this->render('full-views/moreInfo.html.twig', [
                    'productos' => $productos,
                    'peliculas' => $peliculas,
                    'ediciones' => $ediciones,
        ]);
    }

    /**
     * NOTA: La expresión regular de requisito del parámetro título admite letras y guión bajo. 
     * Los guiones bajos se reemplazan por espacios.
     * @Route("/buscar/{busqueda}", name="buscar", requirements={"busqueda"="^[a-zA-Z_ ]*\s*"})
     */
    public function buscarAction(Request $request, $busqueda="") {
        
        if($request->get('buscar')!==null)
        {
            $this->redirectToRoute('buscar', ['titulo'=>$request->get('buscar')]);
        }
        
        str_replace('_', ' ', $busqueda);
        
        $repository = $this->getDoctrine()
                ->getRepository('AppBundle:Pelicula');

        $query = $repository->createQueryBuilder('p')
                ->where('p.titulo LIKE :titulo')
                ->setParameter('titulo', '%' . $busqueda . '%')
                ->orderBy('p.titulo', 'ASC')
                ->getQuery();

        $peliculas = $query->getResult();

        foreach ($peliculas as $p) {
            $p->setSource('Omdb');
            $p->fetch();
        }

        return $this->render('full-views/resultados.html.twig', [
                    'peliculas' => $peliculas,
        ]);
    }

    /**
     * @Route("/checkout/", name="checkout")
     */
    public function checkoutAction(Request $request)
    {
        return $this->render('full-views/checkout.html.twig',[]);
        
    }
    
}
