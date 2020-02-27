<?php

namespace VFrontBundle\Controller;

use CommandeBundle\Entity\Commande;
use CommandeBundle\Entity\livraison;
use CommandeBundle\Form\livraisonType;
use JMS\Payment\CoreBundle\Form\ChoosePaymentMethodType;
use JMS\Payment\CoreBundle\PluginController\PluginController;
use PaiementBundle\Entity\Paiement;
use PaiementBundle\Form\PaiementType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MainController extends Controller
{
    public function indexAction()
    {

        return
     $this->render('@VFront/Default/index.html.twig');
    }
    public function cartAction()
    {
        return
            $this->render('@VFront/Default/cart.html.twig');
    }
    public function commAction(Request $request)
    {
        $paiement = new Paiement();
        $form = $this->createForm(PaiementType::class, $paiement); //génération

        $form = $form->handleRequest($request); //semblabe à un submit (propre à doctrine)
        //Si on clique sur le bouton Valider on a ce traitement :
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();//appel de l'entity manager
            $em->persist($paiement);//L'em enregistre les données dans la BD
            $em->flush(); //commit de l'ajout
            return $this->redirectToRoute("v_front_livr");
        }
        $em=$this->getDoctrine();
        $tabs = $em->getRepository(Commande::class)->findAll();
        return $this->render('@VFront/Default/checkout.html.twig',array("commandes"=>$tabs
        ,'form' => $form->createView()));

    }
    public function livrAction()
    {
        return
            $this->render('@VFront/Default/livraison.html.twig');
    }
    public function orderAction()
    {
        return
            $this->render('@VFront/Default/commande.html.twig');
    }
    public function afficherAction(Request $request)
    {
        $session= $request->getSession();
        $em=$this->getDoctrine();
        $tabs = $em->getRepository(Commande::class)->findAll();
        if ($session->has('panier')){
            $panier =$session->get('panier');
        }else{
            $panier = false;
        }

        return $this->render('@VFront/Default/commande.html.twig',array("commandes"=>$tabs,
         'panier'=>$panier
        ));
    }
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

        }
        return $this->render('@VFront/Default/livraison.html.twig', array('form' => $form->createView()));
    }
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
            return $this->redirectToRoute("v_front_livr");


        }
        return $this->render('@VFront/Default/checkout.html.twig', array('form' => $form->createView()));
    }

}
