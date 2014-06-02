<?php

namespace Caos\MonopolyBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Caos\MonopolyBundle\Entity\Partida;
use Caos\MonopolyBundle\Form\PartidaType;

/**
 * Partida controller.
 *
 */
class PartidaController extends Controller {

    /**
     * Lists all Partida entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CaosMonopolyBundle:Partida')->obtenerTodos();

        return new \Symfony\Component\HttpFoundation\JsonResponse($entities);
    }

    /**
     * Creates a new Partida entity.
     *
     */
    public function createAction(Request $request) {
        $entity = new Partida();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('partida_show', array('id' => $entity->getId())));
        }

        return $this->render('CaosMonopolyBundle:Partida:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Partida entity.
     *
     * @param Partida $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Partida $entity) {
        $form = $this->createForm(new PartidaType(), $entity, array(
            'action' => $this->generateUrl('partida_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Partida entity.
     *
     */
    public function newAction() {
        $entity = new Partida();
        $form = $this->createCreateForm($entity);

        return $this->render('CaosMonopolyBundle:Partida:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Partida entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CaosMonopolyBundle:Partida')->obtenerPorId($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Partida entity.');
        }

        return new \Symfony\Component\HttpFoundation\JsonResponse($entity[0]);
    }

    /**
     * Displays a form to edit an existing Partida entity.
     *
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CaosMonopolyBundle:Partida')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Partida entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CaosMonopolyBundle:Partida:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a Partida entity.
     *
     * @param Partida $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Partida $entity) {
        $form = $this->createForm(new PartidaType(), $entity, array(
            'action' => $this->generateUrl('partida_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Partida entity.
     *
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CaosMonopolyBundle:Partida')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Partida entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('partida_edit', array('id' => $id)));
        }

        return $this->render('CaosMonopolyBundle:Partida:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Partida entity.
     *
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CaosMonopolyBundle:Partida')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Partida entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('partida'));
    }

    /**
     * Creates a form to delete a Partida entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('partida_delete', array('id' => $id)))
                        ->setMethod('DELETE')
                        ->add('submit', 'submit', array('label' => 'Delete'))
                        ->getForm()
        ;
    }

    public function partidasEnEsperaAction() {

        $em = $this->getDoctrine()->getManager();
        $partidas = $em->getRepository("CaosMonopolyBundle:Partida")
                ->obtenerEnEspera();

        return new \Symfony\Component\HttpFoundation\JsonResponse($partidas);
    }

    public function crearAction(Request $request) {
        
        $em = $this->getDoctrine()->getManager();

        $token = $request->get("token");

        $partida = new Partida();
        $partida->setFechaInicio(new \DateTime());
        $partida->setBoteComun(0);
        $partida->setIdJugadorTurno(null);
        $partida->setToken($token);
        $partida->setEstado("esperando");

        $em->persist($partida);
        $em->flush();

        return new \Symfony\Component\HttpFoundation\JsonResponse(array("id" => $partida->getId()));
    }

    public function empezarAction(Request $request, $id) {

        $em = $this->getDoctrine()->getManager();

        $partida = $em->getRepository("CaosMonopolyBundle:Partida")->find($id);

        if ($partida) {
            $partida->setEstado("empezada");
            $em->flush();
        }
        
        $jugadores = $request->get("usuarios");
        foreach($jugadores as $jugador){
            $objJugador = new \Caos\MonopolyBundle\Entity\Jugador();
            $usuario = $em->getRepository("CaosMonopolyBundle:Usuario")->find($jugador["id"]);
            $personaje = $em->getRepository("CaosMonopolyBundle:Personaje")->find($jugador["personaje"]);
            $objJugador->setCarcel(false);
            $objJugador->setDinero(1000);
            $objJugador->setPosicion(0);
            $objJugador->setIdPartida($partida);
            $objJugador->setIdPersonaje($personaje);
            $objJugador->setIdUsuario($usuario);
            
            $em->persist($objJugador);
            $em->flush();
            
        }
        
        return new \Symfony\Component\HttpFoundation\JsonResponse(array("id" => $objJugador->getId()));
        
    }

}
