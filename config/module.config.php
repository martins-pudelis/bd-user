<?php

namespace BdUser;

return array(
    'controllers' => array(
        'invokables' => array(
            'bd_user_index' => 'BdUser\Controller\IndexController',
        ),
    ),
    'forms' => require 'forms.config.php',

    'navigation' => array(
        'default' => array(
            'users' => array(
                'label' => 'Users',
                'route' => 'bd_user_index',
                'order' => 1,
            ),
        ),
    ),

    'router' => array(
        'routes' => array(
            'bd_user_index' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/users',
                    'defaults' => array(
                        'controller' => 'bd_user_index',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                                'controller' => 'bd_user_index'
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),

    'service_manager' => array(
        'aliases' => array(
            'UserService' => 'BdUser\Service\UserService',
        ),
        'factories' => array(
            'BdUser\Service\UserService' => 'BdUser\Service\UserServiceFactory',
        )
    ),

    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                )
            )
        )
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),

    'controller_plugins' => array(
        'invokables' => array(
            'userService' => 'BdUser\Controller\Plugin\UserServicePlugin',
        )
    ),
);