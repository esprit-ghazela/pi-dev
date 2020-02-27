<?php

namespace GrapheBundle\Controller;

use ClubBundle\Entity\competition;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\PieChart;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $pieChart = new PieChart();
        $em= $this->getDoctrine();
        $competitions = $em->getRepository(competition::class)->findAll();
        $p=0;
        foreach($competitions as $competition) {
            $p=$p+$competition->getPrime();
        }

        $data= array();
        $stat=['competition', 'prime'];
        $nb=0;
        array_push($data,$stat);
        foreach($competitions as $competition) {
            $stat=array();
            array_push($stat,$competition->getRegion(),(($competition->getprime()) *100)/$p);
            $nb=($competition->getPrime() *100)/$p;
            $stat=[$competition->getRegion(),$nb];
            array_push($data,$stat);

        }

        $pieChart->getData()->setArrayToDataTable(
            $data
        );
        $pieChart->getOptions()->setTitle('Pourcentages des primes par competition');
        $pieChart->getOptions()->setHeight(500);
        $pieChart->getOptions()->setWidth(900);
        $pieChart->getOptions()->getTitleTextStyle()->setBold(true);
        $pieChart->getOptions()->getTitleTextStyle()->setColor('#009900');
        $pieChart->getOptions()->getTitleTextStyle()->setItalic(true);
        $pieChart->getOptions()->getTitleTextStyle()->setFontName('Arial');
        $pieChart->getOptions()->getTitleTextStyle()->setFontSize(20);


        return $this->render('@Graphe\Default\index.html.twig', array('piechart' => $pieChart));
    }
}





