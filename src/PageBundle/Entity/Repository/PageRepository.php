<?php

namespace PageBundle\Entity\Repository;

/**
 * PageRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PageRepository extends \Doctrine\ORM\EntityRepository
{
        
    /**
     * Get one or null pages
     * 
     * @param int $id
     * @return type
     */
    public function getPage($id)
    {
        $qb = $this->createQueryBuilder('page')
            ->where('page.id = :id AND page.deleted = 0')
            ->setParameter('id', $id);

        return $qb->getQuery()->getOneOrNullResult();
    }    
    
    /**
     * Get all pages
     * 
     * @param bool $justQuery
     * @return type
     */
    public function getPages($justQuery = true)
    {
        $qb = $this->createQueryBuilder('page')
            ->where('page.deleted = 0');
        
        if (!$justQuery) {
            return $qb->getQuery()->getResult();
        }
        
        return $qb->getQuery();
    } 
}