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
    public function moreInfoAction(Request $request, $imdb) {

        //Halla la película
        $pelicula = $this->getDoctrine()
                ->getRepository('AppBundle:Pelicula')
                ->createQueryBuilder('p')
                ->where('p.imdb = :imdb')
                ->setParameter('imdb', $imdb)
                ->getQuery()
                ->getResult()[0];
        
        $pelicula->setSource('Omdb');
        $pelicula->fetch();
        
        //Halla la edicion
        $edicion = $this->getDoctrine()
                ->getRepository('AppBundle:Edicion')
                ->createQueryBuilder('e')
                ->where('e.idPelicula = :idPelicula')
                ->setParameter('idPelicula', $pelicula->getId())
                ->getQuery()
                ->getResult()[0];//Por ahora nos conformaremos con hallar la primera edición...
        
        $productos = $this->getDoctrine()
                ->getRepository('AppBundle:Producto')
                ->createQueryBuilder('pr')
                ->where('pr.idEdicion = :idEdicion')
                ->setParameter('idEdicion', $edicion->getId())
                ->getQuery()
                ->getResult();
        
        return $this->render('full-views/moreInfo.html.twig', [
                    'productos' => $productos,
                    'pelicula' => $pelicula,
                    'edicion'=>$edicion
        ]);
    }

    /**
     * NOTA: La expresión regular de requisito del parámetro título admite letras y guión bajo. 
     * Los guiones bajos se reemplazan por espacios.
     * @Route("/buscar/{busqueda}", name="buscar", requirements={"busqueda"="^[a-zA-Z_ ]*\s*"})
     */
    public function buscarAction(Request $request, $busqueda="") {
        
        if(!$busqueda)
        {
            $busqueda=$request->get('buscar');
            $this->redirectToRoute('buscar', ['busqueda'=>$busqueda]);
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
    
    /**
     * @Route("/crud/", name="crud")
     */
    public function crudController()
    {
        //El usuario ha de ser el administrador para poder ejecutar esto...
        //if(is_admin($user))
        
        return $this->render('full-views/crud-index.html.twig');
        
    }
}
