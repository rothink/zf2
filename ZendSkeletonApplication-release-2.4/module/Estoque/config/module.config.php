<?php
return array(
    'router' => array(
        'routes' => array(
            'application' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/app',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Estoque\Controller',
                        'controller' => 'Index',
                        'action' => 'index'
                    )
                )
            )
        )
    ),
    'controllers' => array(
        'invokables' => array(
            'Estoque\Controller\Index' => 'Estoque\Controller\IndexController'
        )
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__.'/../view/',
        )
    )
);