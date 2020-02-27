<?php

namespace PubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Pub
 *
 * @ORM\Table(name="pub")
 * @var int
 *
 * @ORM\Entity(repositoryClass="PubBundle\Repository\PubRepository")
 */
class Pub
{
    /**
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
     * @ORM\Column(type="string",length=255,nullable=true)
     */
    public $nomImage;
    /**
     * @Assert\File(maxSize="800k")
     */
    public $file;
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var \DateTime
     ** @Assert\GreaterThan("today")
     * @ORM\Column(name="date_debut", type="date")
     */
    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin", type="date")
     *  @Assert\GreaterThan(propertyPath="dateDebut")
     *
     */
    private $dateFin;
    /**
     * @var integer
     *
     * @ORM\Column(name="note", type="integer")
     */
    private $note;



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
     * @return Pub
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
    public function getWebPath(){
        return null===$this->nomImage ? null : $this->getUploadDir.'/'.$this->nomImage;
    }


    protected function getUploadRootDir(){
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
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
     * Get nomImage
     *
     * @return string
     */
    public function getNomImage(){
        return $this->nomImage;
    }
    /**
     * Set description
     *
     * @param string $description
     *
     * @return Pub
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     *
     * @return Pub
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \DateTime
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     *
     * @return Pub
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * @return int
     */
    public function getNote ()
    {
        return $this->note;
    }

    /**
     * @param int $note
     */
    public function setNote ($note)
    {
        $this->note = $note;
    }
    public function __construct()
    {

        $this->note =0;
    }

}

