<?php

namespace CommandeBundle\Controller;

use CommandeBundle\Entity\Commande;
use CommandeBundle\Entity\livraison;
use CommandeBundle\Form\livraisonType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class livraisonController extends Controller
{

        public function ajouterAction(Request $request)
    {
        $livraison = new Livraison() ;
        $form = $this->createForm(livraisonType::class,$livraison);
        $form = $form->handleRequest($request);


        if($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($livraison);
            $em->flush();
            return $this->redirectToRoute("livraison_afficher");

        }
        return $this->render('@Commande/Livraison/ajlivraison.html.twig', array('f' => $form->createView()));
    }
        public function modifierAction(Request $request,$id)
    {

        $em = $this->getDoctrine()->getManager();
        $livraison = $this->getDoctrine()->getRepository(livraison::class)->find($id);


        $form = $this->createForm(livraisonType::class, $livraison);
        $form = $form->handleRequest($request);
        if ($form->isValid()) {
            $em->persist($livraison);
            $em->flush();
            return $this->redirectToRoute("livraison_afficher");

        }
        return $this->render('@Commande/livraison/modlivraison.html.twig', array('form' => $form->createView()));
    }
        public function afficherAction()
    {
        $em=$this->getDoctrine();
        $tabs = $em->getRepository(livraison::class)->findAll();
        return $this->render('@Commande/livraison/listlivr.html.twig',array("livraisons"=>$tabs
        ));
    }
        public function supprimerAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $livraison= $this->getDoctrine()->getRepository(livraison::class)->find($id);
        $em->remove($livraison);
        $em->flush();
        return $this->redirectToRoute("livraison_afficher");
    }
}
