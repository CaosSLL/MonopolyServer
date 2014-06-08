<?php

namespace Caos\MonopolyBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Caos\MonopolyBundle\Entity\PosesionTarjeta;
use Caos\MonopolyBundle\Form\PosesionTarjetaType;

/**
 * PosesionTarjeta controller.
 *
 * @Route("/posesiontarjeta")
 */
class PosesionTarjetaController extends Controller
{

    /**
     * Lists all PosesionTarjeta entities.
     *
     * @Route("/", name="posesiontarjeta")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CaosMonopolyBundle:PosesionTarjeta')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new PosesionTarjeta entity.
     *
     * @Route("/", name="posesiontarjeta_create")
     * @Method("POST")
     * @Template("CaosMonopolyBundle:PosesionTarjeta:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new PosesionTarjeta();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('posesiontarjeta_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a PosesionTarjeta entity.
    *
    * @param PosesionTarjeta $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(PosesionTarjeta $entity)
    {
        $form = $this->createForm(new PosesionTarjetaType(), $entity, array(
            'action' => $this->generateUrl('posesiontarjeta_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new PosesionTarjeta entity.
     *
     * @Route("/new", name="posesiontarjeta_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new PosesionTarjeta();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a PosesionTarjeta entity.
     *
     * @Route("/{id}", name="posesiontarjeta_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CaosMonopolyBundle:PosesionTarjeta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PosesionTarjeta entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing PosesionTarjeta entity.
     *
     * @Route("/{id}/edit", name="posesiontarjeta_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CaosMonopolyBundle:PosesionTarjeta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PosesionTarjeta entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a PosesionTarjeta entity.
    *
    * @param PosesionTarjeta $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(PosesionTarjeta $entity)
    {
        $form = $this->createForm(new PosesionTarjetaType(), $entity, array(
            'action' => $this->generateUrl('posesiontarjeta_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing PosesionTarjeta entity.
     *
     * @Route("/{id}", name="posesiontarjeta_update")
     * @Method("PUT")
     * @Template("CaosMonopolyBundle:PosesionTarjeta:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CaosMonopolyBundle:PosesionTarjeta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find PosesionTarjeta entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('posesiontarjeta_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a PosesionTarjeta entity.
     *
     * @Route("/{id}", name="posesiontarjeta_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CaosMonopolyBundle:PosesionTarjeta')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find PosesionTarjeta entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('posesiontarjeta'));
    }

    /**
     * Creates a form to delete a PosesionTarjeta entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('posesiontarjeta_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
