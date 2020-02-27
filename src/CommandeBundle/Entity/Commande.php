<?php

namespace CommandeBundle\Entity;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\ManyToOne;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\OneToOne;
use JMS\Payment\CoreBundle\Entity\PaymentInstruction;


/**
 *
 * @ORM\Table(name="commande")
 * @ORM\Entity(repositoryClass="CommandeBundle\Repository\CommandeRepository")
 */
class Commande
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
     * @var int
     * @Assert\GreaterThanOrEqual(0)
     * @ORM\Column(name="prixprod", type="integer")
     */
    private $prixprod;
    /**
     *
     * @ORM\Column(type="decimal", precision=10, scale=5)
     */
    private $amount;

    /**
     * @Assert\GreaterThanOrEqual(0)
     * @ORM\Column(name="prixlivr", type="integer")
     */
    private $prixlivr;

    /**
     *
     * @ORM\Column(name="dateCom", type="datetime")
     */
    private $dateCom;
    /**
     *
     * @ORM\Column(name="produit", type="string", length=255)
     */
    private $produit;
    /**
     *
     * @ORM\ManyToOne(targetEntity="CommandeBundle\Entity\Etat",inversedBy="commande")
     */

    private $etat;
    /**
     * @ManyToOne(targetEntity="UserBundle\Entity\User", inversedBy="commande")
     * @JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;


    /**
     * @return mixed
     */
    public function getPrixlivr()
    {
        return $this->prixlivr;
    }

    /**
     * @param mixed $prixlivr
     */
    public function setPrixlivr($prixlivr)
    {
        $this->prixlivr = $prixlivr;
    }

    /**
     * @return mixed
     */
    public function getDateCom()
    {
        return $this->dateCom;
    }

    /**
     * @param mixed $dateCom
     */
    public function setDateCom($dateCom)
    {
        $this->dateCom = $dateCom;
    }

    /**
     * @return mixed
     */
    public function getProduit()
    {
        return $this->produit;
    }

    /**
     * @param mixed $produit
     */
    public function setProduit($produit)
    {
        $this->produit = $produit;
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
     * Set prixTotale
     *
     * @param string $prixTotale
     *
     * @return Commande
     */


    /**
     * @return mixed
     */
    public function getLivraison()
    {
        return $this->livraison;
    }

    /**
     * @param mixed $livraison
     */
    public function setLivraison($livraison)
    {
        $this->livraison = $livraison;
    }

    /**
     * @return string
     */
    public function getPrixprod()
    {
        return $this->prixprod;
    }

    /**
     * @param string $prixprod
     */
    public function setPrixprod($prixprod)
    {
        $this->prixprod = $prixprod;
    }

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
    public function __toString()
    {
        return $this->etat;
    }

    /**
     * @param $amount
     */
    public function getAmount()
    {
        return $this->amount;
    }


    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }




}
