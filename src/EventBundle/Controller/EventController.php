<?php

namespace EventBundle\Controller;

use BalProjetBundle\Entity\projet;
use BalProjetBundle\Form\projetType;
use EventBundle\Entity\Event;
use EventBundle\Form\EventType;
use GFBundle\Entity\chambre;
use GFBundle\Form\chambreType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class EventController extends Controller
{
    public function createAction(Request $request)
    {
        //1.a Créer un objet vide
        $club=new Event();
        //1.b Créer le formulaire
        $form=$this->createForm(EventType::class,$club);
        //1.c Envoie du formulaire à l'utilsateur

        //2.a Récupération des données
        $form=$form->handleRequest($request);
        //3.a Test sur les données
        if( $form->isValid()){
            //4.a Création d'un obet doctrin
            $em=$this->getDoctrine()->getManager();
            //4.b persister les données dans ORM
            $em->persist($club);
            //5.b  sauvegarder les donénes dans la BD
            $em->flush();
            //6.a redirect to route
            return $this->redirectToRoute('ajouterev');
        }
        return $this->render('@Event/event/create.html.twig', array(
            "form"=>$form->createView()
        ));
    }
    public function readAction()
    {
        $em=$this->getDoctrine();
        $tab=$em->getRepository(Event::class)->FindAll();
        return $this->render('@VBack/Template/gestion_evenement.html.twig', array("projets"=>$tab
            // ...
        ));
    }
    public function deleteAction($id)
    {
        //1.a Recupération de notre objet selon l'id envoyé par l'user
        $em=$this->getDoctrine()->getManager();
        $club=$em->getRepository(Event::class)->find($id);
        $em->remove($club);
        $em->flush();
        return $this->redirectToRoute("gestion_evenement");
    }
    public function modifierAction($id,Request $request)
    {
        //1.a Recupération de notre objet selon l'id envoyé par l'user
        $em=$this->getDoctrine()->getManager();
        $club=$em->getRepository(Event::class)->find($id);
        //1.b Créer le formulaire
        $form=$this->createForm(EventType::class,$club);
        //1.c Envoie du formulaire à l'utilsateur

        //2.a Récupération des données
        $form=$form->handleRequest($request);
        //3.a Test sur les données
        if( $form->isValid()){
            $em->flush();
            //6.a redirect to route
            return $this->redirectToRoute('gestion_evenement');
        }
        return $this->render('@Event/event/modifier.html.twig', array(
            "form"=>$form->createView()
        ));
    }
}
