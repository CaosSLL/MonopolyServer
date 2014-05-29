<?php

namespace Caos\MonopolyBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Caos\MonopolyBundle\Entity\Usuario;
use Caos\MonopolyBundle\Form\UsuarioType;

/**
 * Usuario controller.
 *
 */
class UsuarioController extends Controller
{

    public function loginAction(){
        
    }
    
    public function estaAutenticadoAction(){
        if(isset($_SESSION["autenticado"])){
            return new \Symfony\Component\HttpFoundation\JsonResponse(array("autenticado"=>true));
        }else{
            return new \Symfony\Component\HttpFoundation\JsonResponse(array("autenticado"=>false));
        }
    }
    
    /**
     * Lists all Usuario entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CaosMonopolyBundle:Usuario')->obtenerTodos();

        return new \Symfony\Component\HttpFoundation\JsonResponse($entities);
        
    }
    /**
     * Creates a new Usuario entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Usuario();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('usuario_show', array('id' => $entity->getId())));
        }

        return $this->render('CaosMonopolyBundle:Usuario:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));        
    }

    /**
    * Creates a form to create a Usuario entity.
    *
    * @param Usuario $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Usuario $entity)
    {
        $form = $this->createForm(new UsuarioType(), $entity, array(
            'action' => $this->generateUrl('usuario_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Usuario entity.
     *
     */
    public function newAction()
    {
        $entity = new Usuario();
        $form   = $this->createCreateForm($entity);

        return $this->render('CaosMonopolyBundle:Usuario:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Usuario entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CaosMonopolyBundle:Usuario')->obtenerPorId($id);

        if (!$entity) {
            return new \Symfony\Component\HttpFoundation\JsonResponse("");
        }
        
        return new \Symfony\Component\HttpFoundation\JsonResponse($entity[0]);
        
    }

    /**
     * Displays a form to edit an existing Usuario entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CaosMonopolyBundle:Usuario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Usuario entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CaosMonopolyBundle:Usuario:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Usuario entity.
    *
    * @param Usuario $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Usuario $entity)
    {
        $form = $this->createForm(new UsuarioType(), $entity, array(
            'action' => $this->generateUrl('usuario_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Usuario entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CaosMonopolyBundle:Usuario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Usuario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('usuario_edit', array('id' => $id)));
        }

        return $this->render('CaosMonopolyBundle:Usuario:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Usuario entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CaosMonopolyBundle:Usuario')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Usuario entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('usuario'));
    }

    /**
     * Creates a form to delete a Usuario entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('usuario_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    
    /**
     * Método propio que se encarga de crear un nuevo usuario en la BD
     *      Si el nombre de usuario ya se encuentra en la BD devuelve un mensaje de error
     *      Si el nombre de usuario no existe, se crea el nuevo usuario y se le crea una sesión
     * 
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function crearUsuarioAction(Request $request) {
        // Recojo los datos 
        $nombre = $request->get("usuario");
        $password = $request->get("password");
        $email = $request->get("email");
        
        // Comprobamos si el nombre de usuario ya está en la BD
        $em = $this->getDoctrine()->getManager();
        $usuario = $em->getRepository("CaosMonopolyBundle:Usuario")->obtenerPorNombre($nombre);
                
        if($usuario) { 
            // Si el usuario ya existe devolvemos un mensaje de error
            return new \Symfony\Component\HttpFoundation\JsonResponse(array("tipo" => "error", "error" => "El nombre de usuario ya existe"));
            
        } else { 
            // Creamos un nuevo objeto del tipo "Caos\MonopolyBundle\Usuario"
            $nuevo = new Usuario();
            
            // Le damos todos los datos que ha pasado el cliente por el formulario
            $nuevo->setNombre($nombre);
            $nuevo->setPassword(md5($password));
            $nuevo->setEmail($email);
            $nuevo->setEstado(true);
            $nuevo->setRol("ROLE_USER");
            
            // Persistimos el objeto en la BD (ES NEESARIO AMBOS MÉTODOS)
            $em->persist($nuevo);
            $em->flush();
            
            // Iniciar una sesión para el usuario
            session_destroy();
            session_start();
            
            $_SESSION["id"] = $nuevo->getId();
            $_SESSION["user"] = $nuevo->getNombre();
            
            // Devolvemos un mensaje al cliente
            return new \Symfony\Component\HttpFoundation\JsonResponse(array("tipo" => "msg", "msg" => "El usuario se ha creado con éxito"));        
        }
    }
        
}
