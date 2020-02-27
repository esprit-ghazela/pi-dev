<?php

namespace EventBundle\Controller;

use EventBundle\Entity\Event;
use EventBundle\Entity\Reclamation;
use EventBundle\Form\EventType;
use EventBundle\Form\ReclamationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Dompdf\Dompdf;
use Dompdf\Options;
use Knp\Component\Pager\PaginatorInterface;

class ReclamationController extends Controller
{
    /*
     * @Route("/contact",name='contact')
     */
    public function createAction(Request $request)
    {
        //1.a Créer un objet vide
        $club=new Reclamation();
        //1.b Créer le formulaire
        $form=$this->createForm(ReclamationType::class,$club);
        //1.c Envoie du formulaire à l'utilsateur

        //2.a Récupération des données
        $form=$form->handleRequest($request);
        //3.a Test sur les données
        if( $form->isValid()){
            //4.a Création d'un obet doctrin
            $em=$this->getDoctrine()->getManager();
            $club->setDate(new \DateTime('now'));
            //4.b persister les données dans ORM
            $em->persist($club);
            //5.b  sauvegarder les donénes dans la BD
            $em->flush();
            //6.a redirect to route
            return $this->redirectToRoute('ajouterRec');
        }
        return $this->render('@Event/reclamation/create1.html.twig', array(
            "form"=>$form->createView()
        ));
    }
    public function readAction(Request $request)
    {
        $em=$this->getDoctrine();
        $tab=$em->getRepository(Reclamation::class)->myfindAll();
        return $this->render('@VBack/Template/gestion_reclamation.html.twig', array("Rec"=>$tab
            // ...
        ));
    }

    public function readarAction(Request $request)
    {
        $em=$this->getDoctrine();
        $tab=$em->getRepository(Reclamation::class)->myfindAll2();
        return $this->render('@VBack/Template/gestion_reclamation_ar.html.twig', array("Rec"=>$tab
            // ...
        ));
    }

    public function pdfAction()
    {
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');
        $dompdf = new Dompdf($pdfOptions);
        $em=$this->getDoctrine();
        $tab=$em->getRepository(Reclamation::class)->FindAll();
        $html= $this->render('@VBack/Template/gestion_reclamationpdf.html.twig', array("Rec"=>$tab
            // ...
        ));

        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'portrait');
        // Render the HTML as PDF
        $dompdf->render();
        $output = $dompdf->output();
        $path='C:/wamp64/www/v/VBack/pdf/reclamation_pdf.pdf';
        $pdfFilepath = $path;

        // Write file to the desired path
        file_put_contents($pdfFilepath, $output);
        return $this->redirectToRoute("gestion_reclamation");

    }
    public function deleteAction($id)
    {
        //1.a Recupération de notre objet selon l'id envoyé par l'user
        $em=$this->getDoctrine()->getManager();
        $club=$em->getRepository(Reclamation::class)->find($id);
        $em->remove($club);
        $em->flush();
        $mailer= $this->get('mailer');
        $msg = (new \Swift_Message('Votre reservation est supprime'))
            ->setFrom('noreply@twasalni.tn')
            ->setTo('moussir.guembri@esprit.tn')
            ->setBody('Votre reservation est supprime');
        $mailer->send($msg);
        return $this->redirectToRoute("gestion_reclamation");
    }
    public function modifierAction($id,Request $request)
    {
        //1.a Recupération de notre objet selon l'id envoyé par l'user
        $em=$this->getDoctrine()->getManager();
        $club=$em->getRepository(Reclamation::class)->find($id);
        //1.b Créer le formulaire
        $form=$this->createForm(ReclamationType::class,$club);
        //1.c Envoie du formulaire à l'utilsateur

        //2.a Récupération des données
        $form=$form->handleRequest($request);
        //3.a Test sur les données
        if( $form->isValid()){
            $em->flush();
            //6.a redirect to route
            return $this->redirectToRoute('gestion_reclamation');
        }
        return $this->render('@Event/reclamation/modifier1.html.twig', array(
            "form"=>$form->createView()
        ));
    }

    public function archiverAction($id,Request $request)
    {
        //1.a Recupération de notre objet selon l'id envoyé par l'user
        $em=$this->getDoctrine()->getManager();
        $club=$em->getRepository(Reclamation::class)->find($id);
        //1.b Créer le formulaire
      $club->setEtat(0);
            $em->flush();
            //6.a redirect to route
            return $this->redirectToRoute('gestion_reclamation');


    }

    public function restaurerAction($id,Request $request)
    {
        //1.a Recupération de notre objet selon l'id envoyé par l'user
        $em=$this->getDoctrine()->getManager();
        $club=$em->getRepository(Reclamation::class)->find($id);
        //1.b Créer le formulaire
        $club->setEtat(1);
        $em->flush();
        //6.a redirect to route
        return $this->redirectToRoute('gestion_reclamation_ar');


    }



}
