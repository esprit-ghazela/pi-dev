<?php

namespace ClubBundle\Controller;

use ClubBundle\Entity\Club;
use ClubBundle\Entity\competition;
use ClubBundle\Form\ClubType;

use ClubBundle\Form\searchType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CclubController extends Controller
{
    public function createAction(Request $request)
    {
        //1.a Créer un objet vide
        $club=new Club();
        //1.b Créer le formulaire
        $form=$this->createForm(ClubType::class,$club);
        //1.c Envoie du formulaire à l'utilsateur
        $club->setDateCreation(new \DateTime('now'));
        //2.a Récupération des données
        $form=$form->handleRequest($request);
        //3.a Test sur les données
        if( $form->isValid()){

            //4.a Création d'un obet doctrin
            $em=$this->getDoctrine()->getManager();
            $club->uploadProfilePicture();
            //4.b persister les données dans ORM
          $em->persist($club);
            //5.b  sauvegarder les donénes dans la BD
           $em->flush();
            //6.a redirect to route


        }
        return $this->render('@Club/examan/gestion_club.html.twig', array(
            "form"=>$form->createView()
        ));
    }


    public function readAction()
    {

        $em=$this->getDoctrine();
        $tab=$em->getRepository(Club::class)->FindAll();
        $competitions=$em->getRepository(competition::class)->FindAll();
        return $this->render('@VBack/Template/gestion_club.html.twig', array("clubs"=>$tab,"competitions"=>$competitions
            // ...
        ));
    }

    public function read1Action()
    {

        $em=$this->getDoctrine();
        $tab=$em->getRepository(Club::class)->FindAll();
        return $this->render('@VFront/Default/club.html.twig', array("clubs"=>$tab
            // ...
        ));
    }

    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $club = $em->getRepository(Club::class)->find($id);
        $em->remove($club);
        $em->flush();
        $mailer= $this->get('mailer');
        $msg = (new \Swift_Message('Votre club est suprimé'))
            ->setFrom('noreply@twasalni.tn')
            ->setTo($club->getFondateur())
            ->setBody('Votre club est suprimé , contacter votre admin ');

        $mailer->send($msg);
        return $this->redirectToRoute('read');
    }
    public function updateAction($id,Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $club = $em->getRepository(Club::class)->find($id);
        $form = $this->createForm(ClubType::class, $club);
        $form = $form->handleRequest($request);
        if($form->isValid())
        {
            $em->flush();
            return $this->redirectToRoute('read');
        }

        return $this->render('@Club/examan/gestion_club_update.html.twig', array(
            'form'=>$form->createView()
            // ...
        ));
    }


    public function rechercheAction(Request $request)
    {

        $em=$this->getDoctrine();
        $tab=$em->getRepository(Club::class)->FindAll();
        if ($request->isMethod("POST")){
            $nom = $request->get('nom');
            $tab = $em->getRepository("ClubBundle:Club")->findBy(array('nom'=>$nom));
        }
        return $this->render('@Club/examan/gestion_club_search.html.twig', array("clubs"=>$tab
            // ...
        ));
    }
    public function gagnerAction(Request $request,$id)
    {

        $em=$this->getDoctrine()->getManager();
        $club=$em->getRepository(Club::class)->find($id);
        $em = $this->getDoctrine()->getManager();
        $solde=$club->getSolde();
        $price=$club->getCompetition();
        $price2=$price->getPrime();
        $solde1=$solde+$price2;
        $club->setSolde($solde1);
        $em->flush();

        return $this->redirectToRoute('read');

    }
    public function classementAction()
    {

        $em=$this->getDoctrine();
        $tab=$em->getRepository(Club::class)->Findtop();
        return $this->render('@Club/examan/classement.html.twig', array("projets"=>$tab));

    }
}
