<?php

namespace Caos\MonopolyBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Caos\MonopolyBundle\Entity\PosesionCasilla;
use Caos\MonopolyBundle\Form\PosesionCasillaType;

/**
 * PosesionCasilla controller.
 *
 */
class PosesionCasillaController extends Controller {

    /**
     * Lists all PosesionCasilla entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CaosMonopolyBundle:PosesionCasilla')->findAll();

        return $this->render('CaosMonopolyBundle:PosesionCasilla:index.html.twig', array(
                    'entities' => $entities,
        ));
    }

    /**
     * Creates a new PosesionCasilla entity.
     *
     */
    public function createAction(Request $request) {
        $entity = new PosesionCasilla();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('posesioncasilla_show', array('id' => $entity->getId())));
        }

        return $this->render('CaosMonopolyBundle:PosesionCasilla:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a PosesionCasilla entity.
     *
     * @param PosesionCasilla $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(PosesionCasilla $entity) {
        $form = $this->createForm(new PosesionCasillaType(), $entity, array(
            'action' => $this->generateUrl('posesioncasilla_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new PosesionCasilla entity.
     *
     */
    public function newAction() {
        $entity = new PosesionCasilla();
        $form = $this->createCreateForm($entity);

        return $this->render('CaosMonopolyBundle:PosesionCasilla:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a PosesionCasilla entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CaosMonopolyBundle:PosesionCasilla')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PosesionCasilla entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CaosMonopolyBundle:PosesionCasilla:show.html.twig', array(
                    'entity' => $entity,
                    'delete_form' => $deleteForm->createView(),));
    }

    /**
     * Displays a form to edit an existing PosesionCasilla entity.
     *
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CaosMonopolyBundle:PosesionCasilla')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PosesionCasilla entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CaosMonopolyBundle:PosesionCasilla:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a PosesionCasilla entity.
     *
     * @param PosesionCasilla $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(PosesionCasilla $entity) {
        $form = $this->createForm(new PosesionCasillaType(), $entity, array(
            'action' => $this->generateUrl('posesioncasilla_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing PosesionCasilla entity.
     *
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CaosMonopolyBundle:PosesionCasilla')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PosesionCasilla entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('posesioncasilla_edit', array('id' => $id)));
        }

        return $this->render('CaosMonopolyBundle:PosesionCasilla:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a PosesionCasilla entity.
     *
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CaosMonopolyBundle:PosesionCasilla')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find PosesionCasilla entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('posesioncasilla'));
    }

    /**
     * Creates a form to delete a PosesionCasilla entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('posesioncasilla_delete', array('id' => $id)))
                        ->setMethod('DELETE')
                        ->add('submit', 'submit', array('label' => 'Delete'))
                        ->getForm()
        ;
    }

    public function comprobarPosesionesAction($idJugador, $idPartida) {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CaosMonopolyBundle:PosesionCasilla')->comprobarPosesiones($idJugador, $idPartida);

        if ($entities) {
            return new \Symfony\Component\HttpFoundation\JsonResponse($entities);
        } else {
            return new \Symfony\Component\HttpFoundation\JsonResponse(array($idJugador => "No tiene posesiones"));
        }
    }

    public function comprarAction($idCasilla, $idJugador, $idPartida, $dinero) {
        $em = $this->getDoctrine()->getManager();

        $posesionCasilla = new PosesionCasilla();
        $casilla = $em->getRepository('CaosMonopolyBundle:Casilla')->find($idCasilla);
        $posesionCasilla->setIdCasilla($casilla);
        $jugador = $em->getRepository('CaosMonopolyBundle:Jugador')->find($idJugador);
        $posesionCasilla->setIdJugador($jugador);
        $partida = $em->getRepository('CaosMonopolyBundle:Partida')->find($idPartida);
        $posesionCasilla->setIdPartida($partida);
        $posesionCasilla->setHipotecada(0);
        $posesionCasilla->setNumCabania(0);

        $em->persist($posesionCasilla);
        $em->flush();

        $jugador->setDinero($dinero - $casilla->getPrecio());

        $em->flush();

        if ($posesionCasilla->getId()) {
            return new \Symfony\Component\HttpFoundation\JsonResponse(array("idPosesionCasilla" => $posesionCasilla->getId()));
        } else {
            return new \Symfony\Component\HttpFoundation\JsonResponse(array("idPosesionCasilla" => 0));
        }
    }

}
