<?php

namespace ClubBundle\Repository;

/**
 * competitionRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class competitionRepository extends \Doctrine\ORM\EntityRepository
{
    public function findbyname($name)
    {
        $query=$this->getEntityManager()->createQuery("SELECT i FROM ClubBundle:competition i WHERE i.competition='$name");
        return $query->getResult();
    }

}
