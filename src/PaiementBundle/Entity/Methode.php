<?php

namespace PaiementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Methode
 *
 * @ORM\Table(name="methode")
 * @ORM\Entity(repositoryClass="PaiementBundle\Repository\MethodeRepository")
 */
class Methode
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;


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
     * Set name
     *
     * @param string $name
     *
     * @return Methode
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    public function __toString()
    {
        return $this->name;
    }
}

