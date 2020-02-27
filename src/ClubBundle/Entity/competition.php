<?php

namespace ClubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * competition
 *
 * @ORM\Table(name="competition")
 * @ORM\Entity(repositoryClass="ClubBundle\Repository\competitionRepository")
 */
class competition
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
     * @ORM\Column(name="region", type="string", length=255)
     */
    private $region;

    /**
     * @var string
     *
     * @ORM\Column(name="nomcomp", type="string", length=255)
     */
    private $nomcomp;


    /**
     * @var \DateTime
     ** @Assert\GreaterThan("today")
     * @ORM\Column(name="debut", type="date")
     */
    private $debut;

    /**
     * @var \DateTime
     *
     * @Assert\GreaterThan(propertyPath="debut")
     * @ORM\Column(name="final", type="date")
     */
    private $final;

    /**
     * @var int
     *
     * @ORM\Column(name="prime", type="integer")
     */
    private $prime;


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
     * Set region
     *
     * @param string $region
     *
     * @return competition
     */
    public function setRegion($region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set debut
     *
     * @param \DateTime $debut
     *
     * @return competition
     */
    public function setDebut($debut)
    {
        $this->debut = $debut;

        return $this;
    }

    /**
     * Get debut
     *
     * @return \DateTime
     */
    public function getDebut()
    {
        return $this->debut;
    }

    /**
     * Set final
     *
     * @param \DateTime $final
     *
     * @return competition
     */
    public function setFinal($final)
    {
        $this->final = $final;

        return $this;
    }

    /**
     * Get final
     *
     * @return \DateTime
     */
    public function getFinal()
    {
        return $this->final;
    }

    /**
     * Set prime
     *
     * @param integer $prime
     *
     * @return competition
     */
    public function setPrime($prime)
    {
        $this->prime = $prime;

        return $this;
    }

    /**
     * Get prime
     *
     * @return int
     */
    public function getPrime()
    {
        return $this->prime;
    }

    /**
     * @return string
     */
    public function getNomComp()
    {
        return $this->nomcomp;
    }

    /**
     * @param string $nomcomp
     */
    public function setNomComp($nomcomp)
    {
        $this->nomcomp = $nomcomp;
    }

}

