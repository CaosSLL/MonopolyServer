<?php

namespace Caos\MonopolyBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * UsuarioRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UsuarioRepository extends EntityRepository
{
    
    public function obtenerTodos(){
        
        $usuarios = $this->getEntityManager()->createQueryBuilder()
                ->select("u")
                ->from("CaosMonopolyBundle:Usuario","u")
                ->getQuery()
                ->getArrayResult();
        
        return $usuarios;
        
    }
    
    public function obtenerPorId($id){
        
        $usuario = $this->getEntityManager()->createQueryBuilder()
                ->select("u")
                ->from("CaosMonopolyBundle:Usuario","u")
                ->where("u.id = ".$id)
                ->getQuery()
                ->getArrayResult();
        
        return $usuario;
        
    }
    
}