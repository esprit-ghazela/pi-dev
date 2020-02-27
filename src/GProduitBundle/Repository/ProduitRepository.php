<?php

namespace GProduitBundle\Repository;

use Doctrine\ORM\EntityManager;
/**
 * ProduitRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProduitRepository extends \Doctrine\ORM\EntityRepository
{
    public function findArray($array)
    {
        $qb = $this->createQueryBuilder('u')
            ->select('u')
            ->where('u.id IN (:array)')
            ->setParameter('array', $array);
        return $qb->getQuery()->getResult();
    }

    public function findEntitiesByString($str){
        return $this->getEntityManager()
            ->createQuery(
                'SELECT p
                FROM GProduitBundle:Produit p
                WHERE p.nom LIKE :str'
            )
            ->setParameter('str', '%'.$str.'%')
            ->getResult();
    }

    public function findByMarque($marque)
    {
        $Query=$this->getEntityManager()
            ->createQuery(
                'SELECT p
             FROM GProduitBundle:Produit p 
             WHERE p.marque LIKE :marque
             ')
            ->setParameter('marque',$marque) ;
        return $Query->getResult() ;
    }
    public function ModifybyUser($user_id,$id)
    {
        $Query=$this->getEntityManager()
            ->createQuery(
                'SELECT p
             FROM GProduitBundle:Produit p 
             WHERE p.partenaire= :user_id AND p.id= :id
             ')
            ->setParameter('user_id',$user_id)
            ->setParameter('id',$id) ;
        return $Query->getResult() ;
    }



    public function findbyUser($user_id)
    {
        $Query=$this->getEntityManager()
            ->createQuery(
                'SELECT p
             FROM GProduitBundle:Produit p 
             WHERE p.partenaire= :user_id 
             ')
            ->setParameter('user_id',$user_id) ;
        return $Query->getResult() ;
    }

    public function PrixOrdreCroissant()
    {
        $Query=$this->getEntityManager()
            ->createQuery(
                'SELECT p
             FROM GProduitBundle:Produit p 
             ORDER BY p.prix ASC
             ');
        return $Query->getResult() ;
    }

    public function PrixOrdreDecroissant()
    {
        $Query=$this->getEntityManager()
            ->createQuery(
                'SELECT p
             FROM GProduitBundle:Produit p 
             ORDER BY p.prix DESC
             ');
        return $Query->getResult() ;
    }


    public function RechercheNom($nom){

        $query=$this->getEntityManager()
            ->createQuery("Select a From GProduitBundle:Produit a
                Where a.nom Like :nom ")
            ->setParameter('nom','%'.$nom.'%');
        return $query->getResult();
    }





}
