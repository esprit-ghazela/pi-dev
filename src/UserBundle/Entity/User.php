<?php

namespace UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="UserBundle\Repository\UserRepository")
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="string")
     */
    protected $nom;
    /**
     * @ORM\Column(type="string")
     */
    protected $prenom;
    /**
     * @ORM\Column(type="string", nullable=true)
     */

    protected $nomCompany ;
    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $adresse ;

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }


    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return mixed
     */
    public function getNomCompany()
    {
        return $this->nomCompany;
    }

    /**
     * @param mixed $nom_company
     */
    public function setNomCompany($nomCompany)
    {
        $this->nomCompany = $nomCompany;
    }



    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }




    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}