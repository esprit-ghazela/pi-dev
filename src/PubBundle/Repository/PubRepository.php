<?php

namespace PubBundle\Repository;

/**
 * PubRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PubRepository extends \Doctrine\ORM\EntityRepository
{
    public function Findtop()
    {
        $query=$this->getEntityManager()->createQuery("SELECT i FROM PubBundle:Pub i 
order by i.note DESC");
        $query->setMaxResults(3);
        return $query->getResult();
    }
}
