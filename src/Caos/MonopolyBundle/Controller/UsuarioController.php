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
class UsuarioController extends Controller {

    public function loginAction(Request $request) {
        $usuario = $request->get("usuario");
        $password = $request->get("password");

        if ($usuario && $password) {
            $em = $this->getDoctrine()->getManager();
            $u = $em->getRepository("CaosMonopolyBundle:Usuario")
                    ->login($usuario, $password);
//            var_dump($u);
            if ($u) {
                $u = $u[0];
                $session = $request->getSession();
                $session->set("usuario", array("id" => $u->getId(), "nombre" => $u->getNombre(), "rol" => $u->getRol(), "estado" => "", "partida" => ""));
//                session_start();
//                $_SESSION["idUsuario"] = $u->getId();
//                $_SESSION["nombreUsuario"] = $u->getNombre();
//                $_SESSION["rolUsuario"] = $u->getRol();

                return new \Symfony\Component\HttpFoundation\JsonResponse(array("autenticado" => true, "nombre" => $u->getNombre(), "id" => $u->getId()));
            } else {
                return new \Symfony\Component\HttpFoundation\JsonResponse(array("error" => "Usuario o contraseña incorrecto", "autenticado" => false));
            }
        } else {
            return new \Symfony\Component\HttpFoundation\JsonResponse(array("error" => "Campo vacio", "autenticado" => false));
        }
    }

    public function logoutAction(Request $request) {
//        session_start();
//        session_destroy();
        
        $session = $request->getSession("usuario");
        $usu = $this->getDoctrine()->getManager()->getRepository("CaosMonopolyBundle:Usuario")->find($session->get("usuario")["id"]);
        
        $usu->setEstado("");
        
        $this->getDoctrine()->getManager()->flush();
        
        $session->clear();
        return new \Symfony\Component\HttpFoundation\JsonResponse(array("autenticado" => false));
    }

    public function estaAutenticadoAction(Request $request) {
        $session = $request->getSession("usuario");
        if ($session->get("usuario")) {
            $usu = $this->getDoctrine()->getManager()->getRepository("CaosMonopolyBundle:Usuario")->find($session->get("usuario")["id"]);
            return new \Symfony\Component\HttpFoundation\JsonResponse(
                    array(
                "autenticado" => true,
                "id" => $session->get("usuario")["id"],
                "nombre" => $session->get("usuario")["nombre"],
//                "estado" => $session->get("usuario")["estado"],
                "estado" => $usu->getEstado(),
                "partida" => $session->get("usuario")["partida"]
            ));
        } else {
            return new \Symfony\Component\HttpFoundation\JsonResponse(array("autenticado" => false));
        }
    }
    
    public function empezarPartidaSesionAction(Request $request, $idPartida){
        $session = $request->getSession("usuario");
        $usuario = $session->get("usuario");
        $usuario["estado"] = "jugando";
        $usuario["partida"] = $idPartida;
        $session->set("usuario",  $usuario);
        return new \Symfony\Component\HttpFoundation\JsonResponse(array("id" => $usuario["id"]));
    }

    /**
     * Lists all Usuario entities.
     *
     */
    public function indexAction() {
        if ($this->estaAutenticadoAction()) {
            $em = $this->getDoctrine()->getManager();

            $entities = $em->getRepository('CaosMonopolyBundle:Usuario')->obtenerTodos();

            return new \Symfony\Component\HttpFoundation\JsonResponse($entities);
        }
    }

    /**
     * Creates a new Usuario entity.
     *
     */
    public function createAction(Request $request) {
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
                    'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Usuario entity.
     *
     * @param Usuario $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Usuario $entity) {
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
    public function newAction() {
        $entity = new Usuario();
        $form = $this->createCreateForm($entity);

        return $this->render('CaosMonopolyBundle:Usuario:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Usuario entity.
     *
     */
    public function showAction($id) {
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
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CaosMonopolyBundle:Usuario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Usuario entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CaosMonopolyBundle:Usuario:edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
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
    private function createEditForm(Usuario $entity) {
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
    public function updateAction(Request $request, $id) {
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
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Usuario entity.
     *
     */
    public function deleteAction(Request $request, $id) {
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
    private function createDeleteForm($id) {
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

        if ($usuario) {
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
            $this->logoutAction($request);
            $this->loginAction($request);

            // Devolvemos un mensaje al cliente
            return new \Symfony\Component\HttpFoundation\JsonResponse(array(
                "tipo" => "msg",
                "msg" => "El usuario se ha creado con éxito",
                "id" => $nuevo->getId(),
                "nombre" => $nuevo->getNombre(),
            ));
        }
    }

    public function conectadosAction() {

        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CaosMonopolyBundle:Usuario')->obtenerUsuariosConectados();

        return new \Symfony\Component\HttpFoundation\JsonResponse($entities);
    }

    public function cambiarUsuarioAction($idUsuario, $pass, $nombreAntiguo, $nombreNuevo) {

        $em = $this->getDoctrine()->getManager();

        $usuario = $em->getRepository('CaosMonopolyBundle:Usuario')->find($idUsuario);

        if ($usuario->getPassword() === md5($pass)) {
            if ($usuario->getNombre() === $nombreNuevo) {
                return new \Symfony\Component\HttpFoundation\JsonResponse(array("error" => "El usuario ya tiene ese nombre"));
            } else if ($usuario->getNombre() === $nombreAntiguo) {
                $usuario->setNombre($nombreNuevo);
                $em->flush();
            }
            return new \Symfony\Component\HttpFoundation\JsonResponse(array("idUsuario" => $usuario->getId(), "nombreUsuario" => $usuario->getNombre()));
        } else {
            return new \Symfony\Component\HttpFoundation\JsonResponse(array("error" => "La contraseña no es correcta"));
        }
    }

    public function cambiarPasswordAction($idUsuario, $oldPassword, $nuevaPassword) {

        $em = $this->getDoctrine()->getManager();

        $usuario = $em->getRepository('CaosMonopolyBundle:Usuario')->find($idUsuario);

        if ($usuario->getPassword() === md5($oldPassword)) {
            $usuario->setPassword(md5($nuevaPassword));
            $em->flush();
            return new \Symfony\Component\HttpFoundation\JsonResponse(array("idUsuario" => $usuario->getId(), "passwordUsuario" => $usuario->getPassword()));
        } else {
            return new \Symfony\Component\HttpFoundation\JsonResponse(array("error" => "La contraseña no es correcta"));
        }
    }

}
