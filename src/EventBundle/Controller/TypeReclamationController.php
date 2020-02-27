<?php

namespace EventBundle\Controller;

use EventBundle\Entity\Reclamation;
use EventBundle\Entity\TypeReclamation;
use EventBundle\Form\ReclamationType;
use EventBundle\Form\TypeReclamationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TypeReclamationController extends Controller
{
    public function createAction(Request $request)
    {
        //1.a Créer un objet vide
        $club=new TypeReclamation();
        //1.b Créer le formulaire
        $form=$this->createForm(TypeReclamationType::class,$club);
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
            return $this->redirectToRoute('ajouter1');
        }
        return $this->render('@Event/reclamation/create1.html.twig', array(
            "form"=>$form->createView()
        ));
    }
    public function readAction()
    {
        $em=$this->getDoctrine();
        $tab=$em->getRepository(TypeReclamation::class)->FindAll();
        return $this->render('@VBack/Template/gestion_reclamation.html.twig', array("Rec"=>$tab
            // ...
        ));
    }
}
