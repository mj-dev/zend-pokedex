<?php

namespace Pokedex;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                Model\PokedexTable::class => function($container) {
                    $tableGateway = $container->get(Model\PokedexTableGateway::class);
                    return new Model\PokedexTable($tableGateway);
                },
                Model\PokedexTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Pokedex());
                    return new TableGateway('pokedex', $dbAdapter, null, $resultSetPrototype);
                },
            ],
        ];
    }

    public function getControllerConfig()
    {
        return [
            'factories' => [
                Controller\PokedexController::class => function($container) {
                    return new Controller\PokedexController(
                        $container->get(Model\PokedexTable::class)
                    );
                },
            ],
        ];
    }
}