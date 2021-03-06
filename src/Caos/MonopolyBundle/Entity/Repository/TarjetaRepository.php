<?php

namespace Caos\MonopolyBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * TarjetaRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TarjetaRepository extends EntityRepository {

    public function obtenerTodos() {

        $tarjetas = $this->getEntityManager()->createQueryBuilder()
                ->select("t")
                ->from("CaosMonopolyBundle:Tarjeta", "t")
                ->getQuery()
                ->getArrayResult();

        return $tarjetas;
    }
    
    public function obtenerPorId($id){
        
        $tarjeta = $this->getEntityManager()->createQueryBuilder()
                ->select("t")
                ->from("CaosMonopolyBundle:Tarjeta","t")
                ->where("t.id = $id")
                ->getQuery()
                ->getArrayResult();
        
        return $tarjeta;
        
    }
    
}    