<?php

namespace Caos\MonopolyBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Caos\MonopolyBundle\Entity\Personaje;

/**
 * Personaje controller.
 *
 */
class PersonajeController extends Controller
{

    /**
     * Lists all Personaje entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CaosMonopolyBundle:Personaje')->obtenerTodos();

        return new \Symfony\Component\HttpFoundation\JsonResponse($entities);
    }

    /**
     * Finds and displays a Personaje entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CaosMonopolyBundle:Personaje')->obtenerPorId($id);

        if (!$entity) {
            return new \Symfony\Component\HttpFoundation\JsonResponse("");
        }
        
        return new \Symfony\Component\HttpFoundation\JsonResponse($entity[0]);
    }
}
