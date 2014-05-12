<?php

namespace Caos\MonopolyBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * PersonajeRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PersonajeRepository extends EntityRepository
{
    
    public function obtenerTodos(){
        
        $personajes = $this->getEntityManager()->createQueryBuilder()
                ->select("p")
                ->from("CaosMonopolyBundle:Personaje","p")
                ->getQuery()
                ->getArrayResult();
        
        return $personajes;
        
    }
    
    public function obtenerPorId($id){
        
        $personaje = $this->getEntityManager()->createQueryBuilder()
                ->select("p")
                ->from("CaosMonopolyBundle:Personaje","p")
                ->where("p.id = ".$id)
                ->getQuery()
                ->getArrayResult();
        
        return $personaje;
        
    }
    
}
