<?php

namespace PaiementBundle\Controller;


use PaiementBundle\Entity\Paiement;
use PaiementBundle\Form\PaiementType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PaiementController extends Controller
{
    public function paiementAction(Request $request)
    {
        $paiement = new Paiement();
        $form = $this->createForm(PaiementType::class, $commande); //génération
        $form = $form->handleRequest($request); //semblabe à un submit (propre à doctrine)
        //Si on clique sur le bouton Valider on a ce traitement :
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();//appel de l'entity manager
            $em->persist($paiement);//L'em enregistre les données dans la BD
            $em->flush(); //commit de l'ajout
            return $this->redirectToRoute("paiement_afficher");

        }
        return $this->render('@Commande/Commande/addP.html.twig', array('f' => $form->createView()));
    }
    public function afficherPAction(Request $request)
    {
        $em = $this->getDoctrine();
        $tabs = $em->getRepository(Paiement::class)->findAll();
        return $this->render('@Paiement/Paiement/listp.html.twig', array("paiements" => $tabs

        ));
    }
}
