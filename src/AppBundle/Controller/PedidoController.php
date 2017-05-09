<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Pedido;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Pedido controller.
 *
 * @Route("crud_pedido")
 */
class PedidoController extends Controller
{
    /**
     * Lists all pedido entities.
     *
     * @Route("/", name="crud_pedido_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $pedidos = $em->getRepository('AppBundle:Pedido')->findAll();

        return $this->render('pedido/index.html.twig', array(
            'pedidos' => $pedidos,
        ));
    }

    /**
     * Finds and displays a pedido entity.
     *
     * @Route("/{id}", name="crud_pedido_show")
     * @Method("GET")
     */
    public function showAction(Pedido $pedido)
    {

        return $this->render('pedido/show.html.twig', array(
            'pedido' => $pedido,
        ));
    }
}
