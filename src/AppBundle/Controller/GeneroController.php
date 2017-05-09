<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Genero;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Genero controller.
 *
 * @Route("crud_genero")
 */
class GeneroController extends Controller
{
    /**
     * Lists all genero entities.
     *
     * @Route("/", name="crud_genero_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $generos = $em->getRepository('AppBundle:Genero')->findAll();

        return $this->render('genero/index.html.twig', array(
            'generos' => $generos,
        ));
    }

    /**
     * Creates a new genero entity.
     *
     * @Route("/new", name="crud_genero_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $genero = new Genero();
        $form = $this->createForm('AppBundle\Form\GeneroType', $genero);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($genero);
            $em->flush();

            return $this->redirectToRoute('crud_genero_show', array('id' => $genero->getId()));
        }

        return $this->render('genero/new.html.twig', array(
            'genero' => $genero,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a genero entity.
     *
     * @Route("/{id}", name="crud_genero_show")
     * @Method("GET")
     */
    public function showAction(Genero $genero)
    {
        $deleteForm = $this->createDeleteForm($genero);

        return $this->render('genero/show.html.twig', array(
            'genero' => $genero,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing genero entity.
     *
     * @Route("/{id}/edit", name="crud_genero_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Genero $genero)
    {
        $deleteForm = $this->createDeleteForm($genero);
        $editForm = $this->createForm('AppBundle\Form\GeneroType', $genero);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('crud_genero_edit', array('id' => $genero->getId()));
        }

        return $this->render('genero/edit.html.twig', array(
            'genero' => $genero,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a genero entity.
     *
     * @Route("/{id}", name="crud_genero_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Genero $genero)
    {
        $form = $this->createDeleteForm($genero);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($genero);
            $em->flush();
        }

        return $this->redirectToRoute('crud_genero_index');
    }

    /**
     * Creates a form to delete a genero entity.
     *
     * @param Genero $genero The genero entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Genero $genero)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('crud_genero_delete', array('id' => $genero->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
