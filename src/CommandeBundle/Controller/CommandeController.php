<?php

namespace CommandeBundle\Controller;

use CommandeBundle\Entity\CommandeSearch;
use CommandeBundle\Form\CommandeSearchType;
use CommandeBundle\Form\SearchCommandeType;
use CommandeBundle\Repository\CommandeRepository;

use CommandeBundle\Entity\Commande;
use CommandeBundle\Form\CommandeType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Request;





class CommandeController extends AbstractController
{
    public function ajouterAction(Request $request)
    {

        $commande = new Commande();
        //$liv = new $liv()->setCommande()
        $commande->setDateCom(new \DateTime('now'));
        $form = $this->createForm(CommandeType::class,$commande); //génération
        $form = $form->handleRequest($request); //semblabe à un submit (propre à doctrine)
        //Si on clique sur le bouton Valider on a ce traitement :
        /*$form->getData("")*/
        if($form->isValid())
        {   $commande->setAmount((float)($commande->getPrixlivr())+(float)($commande->getPrixprod()));

            $em = $this->getDoctrine()->getManager();//appel de l'entity manager
            $em->persist($commande);//L'em enregistre les données dans la BD
            $em->flush(); //commit de l'ajout
            return $this->redirectToRoute("commande_afficher",['id' => $commande->getId(),
        ]);
        }
        return $this->render('@Commande/Commande/add.html.twig', array('form' => $form->createView()));
    }

    public function modifierAction(Request $request,$id)
    {

        $em = $this->getDoctrine()->getManager();
        $commande = $this->getDoctrine()->getRepository(Commande::class)->find($id);
        $form = $this->createForm(CommandeType::class,$commande);
        $form = $form->handleRequest($request);

        if($form->isValid())
        {

            $em->persist($commande);
            $em->flush();
            return $this->redirectToRoute("commande_afficher");

        }
        return $this->render('@Commande/Commande/update.html.twig', array('form' => $form->createView()));



    }
    public function afficherAction(Request $request)
    {
        $search= new CommandeSearch();
        $form = $this ->createForm(CommandeSearchType::class,$search);
        $form ->handleRequest($request);

        $em=$this->getDoctrine();
        $tabs = $em->getRepository(Commande::class)->findAll($search);
        return $this->render('@Commande/Commande/list.html.twig',array("commandes"=>$tabs,
            'form' => $form->createView()

        ));
    }
    public function supprimerAction(Request $request)
    {
        $id = $request->get('id');
        $em= $this->getDoctrine()->getManager();
        $commande=$em->getRepository('CommandeBundle:Commande')->find($id);


        $em->remove($commande);
        $em->flush();
        return $this->redirectToRoute('commande_afficher');
    }


}
