<?php

namespace CommandeBundle\Entity;
use Doctrine\ORM\Mapping\JoinColumn;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToOne;


/**
 * livraison
 *
 * @ORM\Table(name="livraison")
 * @ORM\Entity(repositoryClass="CommandeBundle\Repository\livraisonRepository")
 */
class livraison
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="adresseLivr", type="string", length=255)
     */
    private $adresseLivr;

    /**
     *
     * @ORM\Column(name="datelivr", type="date")
     */

    private $datelivr;
    /**
     *
     * @ORM\Column(name="etat", type="string", length=255)
     */

    private $etat;
    /**
     * @OneToOne(targetEntity="PaiementBundle\Entity\Paiement")
     *@JoinColumn(name="paiement_id", referencedColumnName="id")
     */
    private $paiement;




    /**
     * @return mixed
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param mixed $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set adresseLivr
     *
     * @param string $adresseLivr
     *
     * @return livraison
     */
    public function setAdresseLivr($adresseLivr)
    {
        $this->adresseLivr = $adresseLivr;

        return $this;
    }

    /**
     * Get adresseLivr
     *
     * @return string
     */
    public function getAdresseLivr()
    {
        return $this->adresseLivr;
    }




    /**
     * @return mixed
     */
    public function getDatelivr()
    {
        return $this->datelivr;
    }

    /**
     * @param mixed $datelivr
     */
    public function setDatelivr($datelivr)
    {
        $this->datelivr = $datelivr;
    }

    /**
     * @return mixed
     */
    public function getPaiement()
    {
        return $this->paiement;
    }

    /**
     * @param mixed $paiement
     */
    public function setPaiement($paiement)
    {
        $this->paiement = $paiement;
    }


}

