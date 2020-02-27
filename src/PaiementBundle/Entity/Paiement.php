<?php

namespace PaiementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\OneToOne;

/**
 * Paiement
 *
 * @ORM\Table(name="paiement")
 * @ORM\Entity(repositoryClass="PaiementBundle\Repository\PaiementRepository")
 */
class Paiement
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
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_companie", type="string", length=255)
     */
    private $nomCompanie;

    /**
     * @var string
     *
     * @ORM\Column(name="Pays", type="string", length=255)
     */
    private $pays;

    /**
     * @var string
     *
     * @ORM\Column(name="district", type="string", length=255)
     */
    private $district;

    /**
     * @var int
     *
     * @ORM\Column(name="codePostal", type="integer")
     */
    private $codePostal;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="PaiementBundle\Entity\Methode",inversedBy="paiement")
     *
     */
    private $methodedepaiement;

    /**
     * @OneToOne(targetEntity="CommandeBundle\Entity\Commande")
     *@JoinColumn(name="commande_id", referencedColumnName="id")
     */
    private $commande;
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
     * Set email
     *
     * @param string $email
     *
     * @return Paiement
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set nomCompanie
     *
     * @param string $nomCompanie
     *
     * @return Paiement
     */
    public function setNomCompanie($nomCompanie)
    {
        $this->nomCompanie = $nomCompanie;

        return $this;
    }

    /**
     * Get nomCompanie
     *
     * @return string
     */
    public function getNomCompanie()
    {
        return $this->nomCompanie;
    }

    /**
     * Set pays
     *
     * @param string $pays
     *
     * @return Paiement
     */
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return string
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Set district
     *
     * @param string $district
     *
     * @return Paiement
     */
    public function setDistrict($district)
    {
        $this->district = $district;

        return $this;
    }

    /**
     * Get district
     *
     * @return string
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * Set codePostal
     *
     * @param integer $codePostal
     *
     * @return Paiement
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Get codePostal
     *
     * @return int
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * Set metodedepaiement
     *
     * @param string $metodedepaiement
     *
     * @return Paiement
     */
    public function setMethodedepaiement($methodedepaiement)
    {
        $this->methodedepaiement = $methodedepaiement;

        return $this;
    }

    /**
     * Get metodedepaiement
     *
     * @return string
     */
    public function getMethodedepaiement()
    {
        return $this->methodedepaiement;
    }

    /**
     * @return mixed
     */
    public function getCommande()
    {
        return $this->commande;
    }

    /**
     * @param mixed $commande
     */
    public function setCommande($commande)
    {
        $this->commande = $commande;
    }



}

