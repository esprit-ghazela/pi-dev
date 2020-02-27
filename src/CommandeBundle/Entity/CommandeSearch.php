<?php

namespace CommandeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CommandeSearch
 *
 * @ORM\Table(name="commande_search")
 * @ORM\Entity(repositoryClass="CommandeBundle\Repository\CommandeSearchRepository")
 */
class CommandeSearch
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
     * @ORM\Column(name="produit", type="string", length=255)
     */
    private $produit;

    /**
     * @var int
     *
     * @ORM\Column(name="prixtotale", type="integer")
     */
    private $prixtotale;


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
     * Set produit
     *
     * @param string $produit
     *
     * @return CommandeSearch
     */
    public function setProduit($produit)
    {
        $this->produit = $produit;

        return $this;
    }

    /**
     * Get produit
     *
     * @return string
     */
    public function getProduit()
    {
        return $this->produit;
    }

    /**
     * Set prixtotale
     *
     * @param integer $prixtotale
     *
     * @return CommandeSearch
     */
    public function setPrixtotale($prixtotale)
    {
        $this->prixtotale = $prixtotale;

        return $this;
    }

    /**
     * Get prixtotale
     *
     * @return int
     */
    public function getPrixtotale()
    {
        return $this->prixtotale;
    }
}

