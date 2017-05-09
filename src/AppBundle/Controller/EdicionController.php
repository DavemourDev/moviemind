<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Edicion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Edicion controller.
 *
 * @Route("crud_edicion")
 */
class EdicionController extends Controller
{
    /**
     * Lists all edicion entities.
     *
     * @Route("/", name="crud_edicion_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $edicions = $em->getRepository('AppBundle:Edicion')->findAll();

        return $this->render('edicion/index.html.twig', array(
            'edicions' => $edicions,
        ));
    }

    /**
     * Creates a new edicion entity.
     *
     * @Route("/new", name="crud_edicion_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $edicion = new Edicion();
        $form = $this->createForm('AppBundle\Form\EdicionType', $edicion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($edicion);
            $em->flush();

            return $this->redirectToRoute('crud_edicion_show', array('id' => $edicion->getId()));
        }

        return $this->render('edicion/new.html.twig', array(
            'edicion' => $edicion,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a edicion entity.
     *
     * @Route("/{id}", name="crud_edicion_show")
     * @Method("GET")
     */
    public function showAction(Edicion $edicion)
    {
        $deleteForm = $this->createDeleteForm($edicion);

        return $this->render('edicion/show.html.twig', array(
            'edicion' => $edicion,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing edicion entity.
     *
     * @Route("/{id}/edit", name="crud_edicion_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Edicion $edicion)
    {
        $deleteForm = $this->createDeleteForm($edicion);
        $editForm = $this->createForm('AppBundle\Form\EdicionType', $edicion);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('crud_edicion_edit', array('id' => $edicion->getId()));
        }

        return $this->render('edicion/edit.html.twig', array(
            'edicion' => $edicion,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a edicion entity.
     *
     * @Route("/{id}", name="crud_edicion_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Edicion $edicion)
    {
        $form = $this->createDeleteForm($edicion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($edicion);
            $em->flush();
        }

        return $this->redirectToRoute('crud_edicion_index');
    }

    /**
     * Creates a form to delete a edicion entity.
     *
     * @param Edicion $edicion The edicion entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Edicion $edicion)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('crud_edicion_delete', array('id' => $edicion->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
