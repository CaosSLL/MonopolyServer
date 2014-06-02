<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                if (0 === strpos($pathinfo, '/_profiler/i')) {
                    // _profiler_info
                    if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                    }

                    // _profiler_import
                    if ($pathinfo === '/_profiler/import') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:importAction',  '_route' => '_profiler_import',);
                    }

                }

                // _profiler_export
                if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]++)\\.txt$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_export')), array (  '_controller' => 'web_profiler.controller.profiler:exportAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        // caos_monopoly_homepage
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'caos_monopoly_homepage')), array (  '_controller' => 'CaosMonopolyBundle:Default:index',));
        }

        if (0 === strpos($pathinfo, '/usuario')) {
            // usuario
            if (rtrim($pathinfo, '/') === '/usuario') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'usuario');
                }

                return array (  '_controller' => 'Caos\\MonopolyBundle\\Controller\\UsuarioController::indexAction',  '_route' => 'usuario',);
            }

            // usuario_show
            if (preg_match('#^/usuario/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'usuario_show')), array (  '_controller' => 'Caos\\MonopolyBundle\\Controller\\UsuarioController::showAction',));
            }

            // usuario_new
            if ($pathinfo === '/usuario/new') {
                return array (  '_controller' => 'Caos\\MonopolyBundle\\Controller\\UsuarioController::newAction',  '_route' => 'usuario_new',);
            }

            // usuario_create
            if ($pathinfo === '/usuario/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_usuario_create;
                }

                return array (  '_controller' => 'Caos\\MonopolyBundle\\Controller\\UsuarioController::createAction',  '_route' => 'usuario_create',);
            }
            not_usuario_create:

            // usuario_edit
            if (preg_match('#^/usuario/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'usuario_edit')), array (  '_controller' => 'Caos\\MonopolyBundle\\Controller\\UsuarioController::editAction',));
            }

            // usuario_update
            if (preg_match('#^/usuario/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_usuario_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'usuario_update')), array (  '_controller' => 'Caos\\MonopolyBundle\\Controller\\UsuarioController::updateAction',));
            }
            not_usuario_update:

            // usuario_delete
            if (preg_match('#^/usuario/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_usuario_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'usuario_delete')), array (  '_controller' => 'Caos\\MonopolyBundle\\Controller\\UsuarioController::deleteAction',));
            }
            not_usuario_delete:

            // usuario_autenticado
            if ($pathinfo === '/usuario/autenticado') {
                return array (  '_controller' => 'Caos\\MonopolyBundle\\Controller\\UsuarioController::estaAutenticadoAction',  '_route' => 'usuario_autenticado',);
            }

            // usuario_login
            if ($pathinfo === '/usuario/login') {
                return array (  '_controller' => 'Caos\\MonopolyBundle\\Controller\\UsuarioController::loginAction',  '_route' => 'usuario_login',);
            }

            // usuario_crear
            if ($pathinfo === '/usuario/crear') {
                return array (  '_controller' => 'Caos\\MonopolyBundle\\Controller\\UsuarioController::crearUsuarioAction',  '_route' => 'usuario_crear',);
            }

        }

        if (0 === strpos($pathinfo, '/p')) {
            if (0 === strpos($pathinfo, '/personaje')) {
                // personaje
                if (rtrim($pathinfo, '/') === '/personaje') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'personaje');
                    }

                    return array (  '_controller' => 'Caos\\MonopolyBundle\\Controller\\PersonajeController::indexAction',  '_route' => 'personaje',);
                }

                // personaje_show
                if (preg_match('#^/personaje/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'personaje_show')), array (  '_controller' => 'Caos\\MonopolyBundle\\Controller\\PersonajeController::showAction',));
                }

            }

            if (0 === strpos($pathinfo, '/partida')) {
                // partida
                if (rtrim($pathinfo, '/') === '/partida') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'partida');
                    }

                    return array (  '_controller' => 'Caos\\MonopolyBundle\\Controller\\PartidaController::indexAction',  '_route' => 'partida',);
                }

                // partida_show
                if (preg_match('#^/partida/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'partida_show')), array (  '_controller' => 'Caos\\MonopolyBundle\\Controller\\PartidaController::showAction',));
                }

                // partida_enEspera
                if ($pathinfo === '/partida/partidasEnEspera') {
                    return array (  '_controller' => 'Caos\\MonopolyBundle\\Controller\\PartidaController::partidasEnEsperaAction',  '_route' => 'partida_enEspera',);
                }

                // partida_new
                if ($pathinfo === '/partida/new') {
                    return array (  '_controller' => 'Caos\\MonopolyBundle\\Controller\\PartidaController::newAction',  '_route' => 'partida_new',);
                }

                // partida_crear
                if ($pathinfo === '/partida/crear') {
                    return array (  '_controller' => 'Caos\\MonopolyBundle\\Controller\\PartidaController::crearAction',  '_route' => 'partida_crear',);
                }

                // partida_empezar
                if (0 === strpos($pathinfo, '/partida/empezar') && preg_match('#^/partida/empezar/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'partida_empezar')), array (  '_controller' => 'Caos\\MonopolyBundle\\Controller\\PartidaController::empezarAction',));
                }

                // partida_create
                if ($pathinfo === '/partida/create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_partida_create;
                    }

                    return array (  '_controller' => 'Caos\\MonopolyBundle\\Controller\\PartidaController::createAction',  '_route' => 'partida_create',);
                }
                not_partida_create:

                // partida_edit
                if (preg_match('#^/partida/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'partida_edit')), array (  '_controller' => 'Caos\\MonopolyBundle\\Controller\\PartidaController::editAction',));
                }

                // partida_update
                if (preg_match('#^/partida/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_partida_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'partida_update')), array (  '_controller' => 'Caos\\MonopolyBundle\\Controller\\PartidaController::updateAction',));
                }
                not_partida_update:

                // partida_delete
                if (preg_match('#^/partida/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_partida_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'partida_delete')), array (  '_controller' => 'Caos\\MonopolyBundle\\Controller\\PartidaController::deleteAction',));
                }
                not_partida_delete:

            }

        }

        if (0 === strpos($pathinfo, '/jugador')) {
            // jugador
            if (rtrim($pathinfo, '/') === '/jugador') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'jugador');
                }

                return array (  '_controller' => 'Caos\\MonopolyBundle\\Controller\\JugadorController::indexAction',  '_route' => 'jugador',);
            }

            // jugador_show
            if (preg_match('#^/jugador/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'jugador_show')), array (  '_controller' => 'Caos\\MonopolyBundle\\Controller\\JugadorController::showAction',));
            }

            // jugador_show_usuario
            if (preg_match('#^/jugador/(?P<id>[^/]++)/show_usuario$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'jugador_show_usuario')), array (  '_controller' => 'Caos\\MonopolyBundle\\Controller\\JugadorController::showUsuarioAction',));
            }

            // jugador_show_partida
            if (preg_match('#^/jugador/(?P<id>[^/]++)/show_partida$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'jugador_show_partida')), array (  '_controller' => 'Caos\\MonopolyBundle\\Controller\\JugadorController::showPartidaAction',));
            }

            // jugador_new
            if ($pathinfo === '/jugador/new') {
                return array (  '_controller' => 'Caos\\MonopolyBundle\\Controller\\JugadorController::newAction',  '_route' => 'jugador_new',);
            }

            // jugador_create
            if ($pathinfo === '/jugador/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_jugador_create;
                }

                return array (  '_controller' => 'Caos\\MonopolyBundle\\Controller\\JugadorController::createAction',  '_route' => 'jugador_create',);
            }
            not_jugador_create:

            // jugador_edit
            if (preg_match('#^/jugador/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'jugador_edit')), array (  '_controller' => 'Caos\\MonopolyBundle\\Controller\\JugadorController::editAction',));
            }

            // jugador_update
            if (preg_match('#^/jugador/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_jugador_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'jugador_update')), array (  '_controller' => 'Caos\\MonopolyBundle\\Controller\\JugadorController::updateAction',));
            }
            not_jugador_update:

            // jugador_delete
            if (preg_match('#^/jugador/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_jugador_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'jugador_delete')), array (  '_controller' => 'Caos\\MonopolyBundle\\Controller\\JugadorController::deleteAction',));
            }
            not_jugador_delete:

        }

        if (0 === strpos($pathinfo, '/casilla')) {
            // casilla
            if (rtrim($pathinfo, '/') === '/casilla') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'casilla');
                }

                return array (  '_controller' => 'Caos\\MonopolyBundle\\Controller\\CasillaController::indexAction',  '_route' => 'casilla',);
            }

            // casilla_show
            if (preg_match('#^/casilla/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'casilla_show')), array (  '_controller' => 'Caos\\MonopolyBundle\\Controller\\CasillaController::showAction',));
            }

        }

        if (0 === strpos($pathinfo, '/posesioncasilla')) {
            // posesioncasilla
            if (rtrim($pathinfo, '/') === '/posesioncasilla') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'posesioncasilla');
                }

                return array (  '_controller' => 'Caos\\MonopolyBundle\\Controller\\PosesionCasillaController::indexAction',  '_route' => 'posesioncasilla',);
            }

            // posesioncasilla_show
            if (preg_match('#^/posesioncasilla/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'posesioncasilla_show')), array (  '_controller' => 'Caos\\MonopolyBundle\\Controller\\PosesionCasillaController::showAction',));
            }

            // posesioncasilla_new
            if ($pathinfo === '/posesioncasilla/new') {
                return array (  '_controller' => 'Caos\\MonopolyBundle\\Controller\\PosesionCasillaController::newAction',  '_route' => 'posesioncasilla_new',);
            }

            // posesioncasilla_create
            if ($pathinfo === '/posesioncasilla/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_posesioncasilla_create;
                }

                return array (  '_controller' => 'Caos\\MonopolyBundle\\Controller\\PosesionCasillaController::createAction',  '_route' => 'posesioncasilla_create',);
            }
            not_posesioncasilla_create:

            // posesioncasilla_edit
            if (preg_match('#^/posesioncasilla/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'posesioncasilla_edit')), array (  '_controller' => 'Caos\\MonopolyBundle\\Controller\\PosesionCasillaController::editAction',));
            }

            // posesioncasilla_update
            if (preg_match('#^/posesioncasilla/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_posesioncasilla_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'posesioncasilla_update')), array (  '_controller' => 'Caos\\MonopolyBundle\\Controller\\PosesionCasillaController::updateAction',));
            }
            not_posesioncasilla_update:

            // posesioncasilla_delete
            if (preg_match('#^/posesioncasilla/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_posesioncasilla_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'posesioncasilla_delete')), array (  '_controller' => 'Caos\\MonopolyBundle\\Controller\\PosesionCasillaController::deleteAction',));
            }
            not_posesioncasilla_delete:

        }

        // _welcome
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', '_welcome');
            }

            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\WelcomeController::indexAction',  '_route' => '_welcome',);
        }

        if (0 === strpos($pathinfo, '/demo')) {
            if (0 === strpos($pathinfo, '/demo/secured')) {
                if (0 === strpos($pathinfo, '/demo/secured/log')) {
                    if (0 === strpos($pathinfo, '/demo/secured/login')) {
                        // _demo_login
                        if ($pathinfo === '/demo/secured/login') {
                            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::loginAction',  '_route' => '_demo_login',);
                        }

                        // _security_check
                        if ($pathinfo === '/demo/secured/login_check') {
                            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::securityCheckAction',  '_route' => '_security_check',);
                        }

                    }

                    // _demo_logout
                    if ($pathinfo === '/demo/secured/logout') {
                        return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::logoutAction',  '_route' => '_demo_logout',);
                    }

                }

                if (0 === strpos($pathinfo, '/demo/secured/hello')) {
                    // acme_demo_secured_hello
                    if ($pathinfo === '/demo/secured/hello') {
                        return array (  'name' => 'World',  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',  '_route' => 'acme_demo_secured_hello',);
                    }

                    // _demo_secured_hello
                    if (preg_match('#^/demo/secured/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_secured_hello')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',));
                    }

                    // _demo_secured_hello_admin
                    if (0 === strpos($pathinfo, '/demo/secured/hello/admin') && preg_match('#^/demo/secured/hello/admin/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_secured_hello_admin')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloadminAction',));
                    }

                }

            }

            // _demo
            if (rtrim($pathinfo, '/') === '/demo') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_demo');
                }

                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::indexAction',  '_route' => '_demo',);
            }

            // _demo_hello
            if (0 === strpos($pathinfo, '/demo/hello') && preg_match('#^/demo/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_hello')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::helloAction',));
            }

            // _demo_contact
            if ($pathinfo === '/demo/contact') {
                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::contactAction',  '_route' => '_demo_contact',);
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
