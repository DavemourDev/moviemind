<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Pelicula;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Pelicula controller.
 *
 * @Route("crud_pelicula")
 */
class PeliculaController extends Controller
{
    /**
     * Lists all pelicula entities.
     *
     * @Route("/", name="crud_pelicula_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $peliculas = $em->getRepository('AppBundle:Pelicula')->findAll();

        return $this->render('pelicula/index.html.twig', array(
            'peliculas' => $peliculas,
        ));
    }

    /**
     * Creates a new pelicula entity.
     *
     * @Route("/new", name="crud_pelicula_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $pelicula = new Pelicula();
        $form = $this->createForm('AppBundle\Form\PeliculaType', $pelicula);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($pelicula);
            $em->flush();

            return $this->redirectToRoute('crud_pelicula_show', array('id' => $pelicula->getId()));
        }

        return $this->render('pelicula/new.html.twig', array(
            'pelicula' => $pelicula,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a pelicula entity.
     *
     * @Route("/{id}", name="crud_pelicula_show")
     * @Method("GET")
     */
    public function showAction(Pelicula $pelicula)
    {
        $deleteForm = $this->createDeleteForm($pelicula);

        return $this->render('pelicula/show.html.twig', array(
            'pelicula' => $pelicula,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing pelicula entity.
     *
     * @Route("/{id}/edit", name="crud_pelicula_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Pelicula $pelicula)
    {
        $deleteForm = $this->createDeleteForm($pelicula);
        $editForm = $this->createForm('AppBundle\Form\PeliculaType', $pelicula);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('crud_pelicula_edit', array('id' => $pelicula->getId()));
        }

        return $this->render('pelicula/edit.html.twig', array(
            'pelicula' => $pelicula,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a pelicula entity.
     *
     * @Route("/{id}", name="crud_pelicula_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Pelicula $pelicula)
    {
        $form = $this->createDeleteForm($pelicula);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($pelicula);
            $em->flush();
        }

        return $this->redirectToRoute('crud_pelicula_index');
    }

    /**
     * Creates a form to delete a pelicula entity.
     *
     * @param Pelicula $pelicula The pelicula entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Pelicula $pelicula)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('crud_pelicula_delete', array('id' => $pelicula->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
