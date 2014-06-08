<?php

namespace Caos\MonopolyBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Caos\MonopolyBundle\Entity\Jugador;
use Caos\MonopolyBundle\Form\JugadorType;

/**
 * Jugador controller.
 *
 */
class JugadorController extends Controller
{

    /**
     * Lists all Jugador entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CaosMonopolyBundle:Jugador')->obtenerTodos();

        return new \Symfony\Component\HttpFoundation\JsonResponse($entities);
    }
    /**
     * Creates a new Jugador entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Jugador();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('jugador_show', array('id' => $entity->getId())));
        }

        return $this->render('CaosMonopolyBundle:Jugador:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Jugador entity.
    *
    * @param Jugador $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Jugador $entity)
    {
        $form = $this->createForm(new JugadorType(), $entity, array(
            'action' => $this->generateUrl('jugador_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Jugador entity.
     *
     */
    public function newAction()
    {
        $entity = new Jugador();
        $form   = $this->createCreateForm($entity);

        return $this->render('CaosMonopolyBundle:Jugador:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Jugador entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CaosMonopolyBundle:Jugador')->obtenerPorId($id);

        if (!$entity) {
            return new \Symfony\Component\HttpFoundation\JsonResponse("");
        }
        
        return new \Symfony\Component\HttpFoundation\JsonResponse($entity[0]);
    }
    
    /**
     * Finds and displays a Jugador entity.
     *
     */
    public function showUsuarioAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CaosMonopolyBundle:Jugador')->obtenerPorUsuario($id);

        if (!$entity) {
            return new \Symfony\Component\HttpFoundation\JsonResponse("");
        }
        
        return new \Symfony\Component\HttpFoundation\JsonResponse($entity);
    }
    
    /**
     * Finds and displays a Jugador entity.
     *
     */
    public function showPartidaAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CaosMonopolyBundle:Jugador')->obtenerPorPartida($id);

        if (!$entity) {
            return new \Symfony\Component\HttpFoundation\JsonResponse("");
        }
        
        return new \Symfony\Component\HttpFoundation\JsonResponse($entity);
    }

    /**
     * Displays a form to edit an existing Jugador entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CaosMonopolyBundle:Jugador')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Jugador entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CaosMonopolyBundle:Jugador:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Jugador entity.
    *
    * @param Jugador $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Jugador $entity)
    {
        $form = $this->createForm(new JugadorType(), $entity, array(
            'action' => $this->generateUrl('jugador_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Jugador entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CaosMonopolyBundle:Jugador')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Jugador entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('jugador_edit', array('id' => $id)));
        }

        return $this->render('CaosMonopolyBundle:Jugador:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Jugador entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CaosMonopolyBundle:Jugador')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Jugador entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('jugador'));
    }

    /**
     * Creates a form to delete a Jugador entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('jugador_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    
    public function personajesDisponiblesAction($token){
        
        $personajes = $this->getDoctrine()->getManager()
                ->getRepository("CaosMonopolyBundle:Jugador")->obtenerPersonajes($token);
        
        return new \Symfony\Component\HttpFoundation\JsonResponse($personajes);
        
    }
    
}
