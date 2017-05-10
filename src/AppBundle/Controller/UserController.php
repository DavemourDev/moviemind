<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Maneja todas las acciones relacionadas con la gestión de sesión de usuario.
 *
 * @author David
 */
class UserController extends Controller
{
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

    /**
     * @Route("/login/", name="login")
     */
    public function loginAction(Request $request)
    {
        $notice='';
        
        $user=$request->get('user');
        $password=$request->get('password');
        
        if(empty($user) || empty($email) || empty($password) || empty($cpassword))
        {
            return $this->render("full-views/login-register.html.twig",[
                'notice'=>'Some fields sre incomplete...',
                'error'=>true
            ]);
        }
            
        if(! ($cpassword == $password))
        {
            return $this->render("full-views/login-register.html.twig",[
                'notice'=>'Password confirm error.',
                'error'=>true
            ]);
        }
        
        $em=$this->getDoctrine()->getManager();
        
        $repository=$em->getRepository('AppBundle:Cliente');
        
        $client=$repository->findOneBy(['nombre'=>$user, 'password']);
        
        if($client)
        {
            
        }
        else
        {
            return $this->render("full-views/login-register.html.twig",[
                'notice'=>'User and password doesn\'t match',
                'error'=>true
            ]);
        }
        
        return $this->render("full-views/test.html.twig",[
            'user'=>$user,
            'notice'=>$notice
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
    
}
