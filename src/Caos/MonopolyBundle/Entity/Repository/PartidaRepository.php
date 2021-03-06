<?php

namespace Caos\MonopolyBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * PartidaRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PartidaRepository extends EntityRepository
{
    
    public function obtenerTodos(){
        
        $partidas = $this->getEntityManager()->createQueryBuilder()
                ->select("p")
                ->from("CaosMonopolyBundle:Partida","p")
                ->getQuery()
                ->getArrayResult();
        
        return $partidas;
        
    }
    
    public function obtenerPorId($id){
        
        $partida = $this->getEntityManager()->createQueryBuilder()
                ->select("p")
                ->from("CaosMonopolyBundle:Partida","p")
                ->where("p.id = ".$id)
                ->getQuery()
                ->getArrayResult();
        
        return $partida;
        
    }
    
    public function obtenerEnEspera(){
        
        $partida = $this->getEntityManager()->createQueryBuilder()
                ->select("p")
                ->from("CaosMonopolyBundle:Partida","p")
                ->where("p.estado = 'esperando'")
                ->getQuery()
                ->getArrayResult();
        
        return $partida;
        
    }
    
}
