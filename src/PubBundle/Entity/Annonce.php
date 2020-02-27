<?php

namespace PubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Annonce
 *
 * @ORM\Table(name="annonce")
 * @ORM\Entity(repositoryClass="PubBundle\Repository\AnnonceRepository")
 */
class Annonce
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;
    /**
     * @ORM\Column(type="string",length=255,nullable=true)
     */
    public $Image;
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
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;


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
     * @return Annonce
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
        return null===$this->Image ? null : $this->getUploadDir.'/'.$this->Image;
    }

    protected function getUploadRootDir(){
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }
    protected function getUploadDir(){
        return 'images';
    }
    public function uploadProfilePicture(){
        $this->file->move($this->getUploadRootDir(), $this->file->getClientOriginalName());
        $this->Image=$this->file->getClientOriginalName();
        $this->file=null;
    }

    /**
     * Set Image
     *
     * @param string $Image
     *
     * @return Categorie
     */
    public function setImage($Image){
        $this->Image==$Image;
        return $this;
    }

    /**
     * Get Image
     *
     * @return string
     */
    public function getImage(){
        return $this->Image;
    }
    /**
     * @return mixed

*/

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Annonce
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Annonce
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
}

