<?php

namespace ClubBundle\Controller;

use ClubBundle\Entity\competition;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Competition controller.
 *
 */
class competitionController extends Controller
{
    /**
     * Lists all competition entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $competitions = $em->getRepository('ClubBundle:competition')->findAll();

        return $this->render('competition/index.html.twig', array(
            'competitions' => $competitions,
        ));
    }

    /**
     * Creates a new competition entity.
     *
     */
    public function newAction(Request $request)
    {
        $competition = new Competition();
        $form = $this->createForm('ClubBundle\Form\competitionType', $competition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($competition);
            $em->flush();

            return $this->redirectToRoute('competition_show', array('id' => $competition->getId()));
        }

        return $this->render('competition/new.html.twig', array(
            'competition' => $competition,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a competition entity.
     *
     */
    public function showAction(competition $competition)
    {
        $deleteForm = $this->createDeleteForm($competition);

        return $this->render('competition/show.html.twig', array(
            'competition' => $competition,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing competition entity.
     *
     */
    public function editAction(Request $request, competition $competition)
    {
        $deleteForm = $this->createDeleteForm($competition);
        $editForm = $this->createForm('ClubBundle\Form\competitionType', $competition);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('competition_edit', array('id' => $competition->getId()));
        }

        return $this->render('competition/edit.html.twig', array(
            'competition' => $competition,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a competition entity.
     *
     */
    public function deleteAction(Request $request, competition $competition)
    {
        $form = $this->createDeleteForm($competition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($competition);
            $em->flush();
        }

        return $this->redirectToRoute('competition_index');
    }


    /**
     * Creates a form to delete a competition entity.
     *
     * @param competition $competition The competition entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(competition $competition)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('competition_delete', array('id' => $competition->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }




}
