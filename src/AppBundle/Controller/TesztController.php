<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Teszt;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Teszt controller.
 *
 */
class TesztController extends Controller
{
    /**
     * Lists all teszt entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $teszts = $em->getRepository('AppBundle:Teszt')->findAll();

        return $this->render('teszt/index.html.twig', array(
            'teszts' => $teszts,
        ));
    }

    /**
     * Creates a new teszt entity.
     *
     */
    public function newAction(Request $request)
    {
        $teszt = new Teszt();
        $form = $this->createForm('AppBundle\Form\TesztType', $teszt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($teszt);
            $em->flush($teszt);

            return $this->redirectToRoute('Gradient_show', array('id' => $teszt->getId()));
        }

        return $this->render('teszt/new.html.twig', array(
            'teszt' => $teszt,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a teszt entity.
     *
     */
    public function showAction(Teszt $teszt)
    {
        $deleteForm = $this->createDeleteForm($teszt);

        return $this->render('teszt/show.html.twig', array(
            'teszt' => $teszt,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing teszt entity.
     *
     */
    public function editAction(Request $request, Teszt $teszt)
    {
        $deleteForm = $this->createDeleteForm($teszt);
        $editForm = $this->createForm('AppBundle\Form\TesztType', $teszt);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('Gradient_edit', array('id' => $teszt->getId()));
        }

        return $this->render('teszt/edit.html.twig', array(
            'teszt' => $teszt,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a teszt entity.
     *
     */
    public function deleteAction(Request $request, Teszt $teszt)
    {
        $form = $this->createDeleteForm($teszt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($teszt);
            $em->flush($teszt);
        }

        return $this->redirectToRoute('Gradient_index');
    }

    /**
     * Creates a form to delete a teszt entity.
     *
     * @param Teszt $teszt The teszt entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Teszt $teszt)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('Gradient_delete', array('id' => $teszt->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
