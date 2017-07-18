<?php
namespace Pokedex;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'controllers' => [
        'factories' => [
            Controller\PokedexController::class => InvokableFactory::class,
        ],
    ],
    'router' => array(
        'routes' => array(
            'pokedex' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/pokedex[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => Controller\PokedexController::class,
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
