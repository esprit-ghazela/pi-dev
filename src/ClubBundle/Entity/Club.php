<?php

namespace ClubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bundle\FrameworkBundle\Tests\Fixtures\Validation\Categorie;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Club
 *
 * @ORM\Table(name="club")
 * @ORM\Entity(repositoryClass="ClubBundle\Repository\ClubRepository")
 */
class Club
{
    /**
     * @ORM\ManyToOne(targetEntity="competition")
     * @ORM\JoinColumn(name="competition",referencedColumnName="id")
     */
    private $competition;

    /**
     * @return mixed
     */
    public function getCompetition()
    {
        return $this->competition;
    }

    /**
     * @param mixed $competition
     */
    public function setCompetition($competition)
    {
        $this->competition = $competition;
    }

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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="fondateur", type="string", length=255)
     */
    private $fondateur;
    /**
     * @var int
     *
     * @ORM\Column(name="solde", type="integer",nullable=true)
     */
    private $solde;

    /**
     * @ORM\Column(type="string",length=255,nullable=true)
     */
    public $nomImage;
    /**
     * @Assert\File(maxSize="800k")
     */
    public $file;

    public function getWebPath(){
        return null===$this->nomImage ? null : $this->getUploadDir.'/'.$this->nomImage;
    }

    protected function getUploadRootDir(){
        return __DIR__.'../../../../web/'.$this->getUploadDir();
    }
    protected function getUploadDir(){
        return 'images';
    }
    public function uploadProfilePicture(){
        $this->file->move($this->getUploadRootDir(), $this->file->getClientOriginalName());
        $this->nomImage=$this->file->getClientOriginalName();
        $this->file=null;
    }

    /**
     * Get nomImage
     *
     * @return string
     */
    public function getNomImage(){
        return $this->nomImage;
    }

    /**
     * Set nomImage
     *
     * @param string $nomImage
     *
     * @return Categorie
     */
    public function setNomImage($nomImage){
        $this->nomImage==$nomImage;
        return $this;
    }

    /**
     * @ORM\Column(type="date")
     */



    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation", type="date")
     */
    private $dateCreation;




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
     * Set nom
     *
     * @param string $nom
     *
     * @return Club
     */



    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return Club
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * @return int
     */
    public function getSolde()
    {
        return $this->solde;
    }

    /**
     * @param int $solde
     */
    public function setSolde($solde)
    {
        $this->solde = $solde;
    }

    /**
     * @return string
     */
    public function getFondateur()
    {
        return $this->fondateur;
    }

    /**
     * @param string $fondateur
     */
    public function setFondateur($fondateur)
    {
        $this->fondateur = $fondateur;
    }






}

