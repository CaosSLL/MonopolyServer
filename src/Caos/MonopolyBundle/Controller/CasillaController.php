<?php

namespace Caos\MonopolyBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Caos\MonopolyBundle\Entity\Casilla;

/**
 * Casilla controller.
 *
 */
class CasillaController extends Controller
{

    /**
     * Lists all Casilla entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CaosMonopolyBundle:Casilla')->obtenerTodos();

        return \Symfony\Component\HttpFoundation\JsonResponse($entities);
        
    }

    /**
     * Finds and displays a Casilla entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CaosMonopolyBundle:Casilla')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Casilla entity.');
        }

        return $this->render('CaosMonopolyBundle:Casilla:show.html.twig', array(
            'entity'      => $entity,
        ));
    }
}
