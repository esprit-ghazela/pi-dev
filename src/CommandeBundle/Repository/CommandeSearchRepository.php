<?php

namespace CommandeBundle\Repository;

use CommandeBundle\Entity\CommandeSearch;
use Doctrine\ORM\Mapping;
use Doctrine\ORM\Query;

/**
 * CommandeSearchRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CommandeSearchRepository extends \Doctrine\ORM\EntityRepository
{
    public function __construct($em, Mapping\ClassMetadata $class)
    {
        parent::__construct($em, $class);
    }
    public function findAll(CommandeSearch $search)
    {
    }
}
