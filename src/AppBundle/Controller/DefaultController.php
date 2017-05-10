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
     * @Route("/info/{id}", name="products")
     */
    public function productsAction($id, Request $request) 
    {
        
        
    }
    
    
    
    /**
     * @Route("/info/", name="info")
     */
    public function infoAction(Request $request) {
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

        return $this->render('full-views/test.html.twig', [
                    'productos' => $productos,
                    'peliculas' => $peliculas,
                    'ediciones' => $ediciones,
        ]);
        
    }

    
    /**
     * @Route("/login-register/", name="login-register")
     */
    public function loginRegisterAction(Request $request) {
    
        return $this->render('full-views/login-register.html.twig', [
            'error'=>false,
            'notice'=>''
        ]);
        
    }
    
    /**
     * @Route("/register/", name="register")
     */
    public function registerAction(Request $request)
    {
        $notice='';
        
        $user=$request->get('user');
        $email=$request->get('email');
        $password=$request->get('password');
        $cpassword=$request->get('password-confirm');
        
        if(empty($user) || empty($email) || empty($password) || empty($cpassword))
        {
            return $this->render("full-views/login-register.html.twig",[
                'notice'=>'No has completado todos los campos...',
                'error'=>true
            ]);
        }
            
        if(! ($cpassword == $password))
        {
            return $this->render("full-views/login-register.html.twig",[
                'notice'=>'La contraseña no coincide con su confirmación',
                'error'=>true
            ]);
        }
        
        
        return $this->render("full-views/test.html.twig",[
            'user'=>$user,
            'notice'=>$notice
        ]);
    }
    
}
