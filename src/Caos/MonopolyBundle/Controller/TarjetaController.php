<?php

namespace Caos\MonopolyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Caos\MonopolyBundle\Entity\Tarjeta;

/**
 * Casilla controller.
 *
 */
class TarjetaController extends Controller {

    /**
     * Lists all Casilla entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CaosMonopolyBundle:Tarjeta')->obtenerTodos();

        return new \Symfony\Component\HttpFoundation\JsonResponse($entities);
    }

    /**
     * Finds and displays a Casilla entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CaosMonopolyBundle:Tarjeta')->obtenerPorId($id);

        if (!$entity) {
//            throw $this->createNotFoundException('Unable to find Casilla entity.');
            return new \Symfony\Component\HttpFoundation\JsonResponse(array("idTarjeta"=>0));
        }

        return new \Symfony\Component\HttpFoundation\JsonResponse($entity[0]);
    }

}
