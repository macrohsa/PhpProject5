<?php


namespace Panelcontrol;

return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'segment',
                'options' => array(
                    'route'    => '[/]',
                    'defaults' => array(
                        'controller' => 'Micuenta\Controller\Cuenta',
                        'action'     => 'index',
                    ),
                ),
            ),
            'user' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/user[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Micuenta\Controller\Cuenta',
                        'action'     => 'index',
                    ),
                ),
            ),
            'login' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/login[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Micuenta\Controller\Cuenta',
                        'action'     => 'login',
                    ),
                ),
            ),
            'plan' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/plan[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Micuenta\Controller\Plan',
                        'action'     => 'index',
                    ),
                ),
            ),
            'producto' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/producto[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Micuenta\Controller\Producto',
                        'action'     => 'index',
                    ),
                ),
            ),
            'formapago' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/formapago[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Micuenta\Controller\Formapago',
                        'action'     => 'index',
                    ),
                ),
            ),
            'fotografo' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/fotografo[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Micuenta\Controller\Fotografo',
                        'action'     => 'index',
                    ),
                ),
            )
        ),
    ),
    'doctrine' => array(
  'driver' => array(
    'application_entities' => array(
      'class' =>'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
      'cache' => 'array',
      'paths' => array(__DIR__ . '/../src/Micuenta/Model')
    ),

    'orm_default' => array(
      'drivers' => array(
        'Micuenta\Model' => 'application_entities'
      )
))),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'factories' => array(
            'translator' => 'Zend\Mvc\Service\TranslatorServiceFactory',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Micuenta\Controller\Index' => 'Micuenta\Controller\IndexController',
            'Micuenta\Controller\Cuenta' => 'Micuenta\Controller\CuentaController',
            'Micuenta\Controller\Plan' => 'Micuenta\Controller\PlanController',
            'Micuenta\Controller\Fotografo' => 'Micuenta\Controller\FotografoController',
            'Micuenta\Controller\Producto' => 'Micuenta\Controller\ProductoController',
            'Micuenta\Controller\Formapago' => 'Micuenta\Controller\FormapagoController',
            'Panelcontrol\Controller\Index' => 'Panelcontrol\Controller\IndexController'
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'layout/cuenta'           => __DIR__ . '/../view/layout/layout_cuenta.phtml',
            'layout/fotografo'           => __DIR__ . '/../view/layout/layout_fotog.phtml',
            'panelcontrol/index/index' => __DIR__ . '/../view/panelcontrol/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
);


