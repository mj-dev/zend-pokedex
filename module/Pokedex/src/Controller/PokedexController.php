<?php

namespace Pokedex\Controller;

use Pokedex\Model\Pokedex;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class PokedexController extends AbstractActionController
{
    // Add this property:
    private $table;

    // Add this constructor:
    public function __construct(PokedexTable $table)
    {
        $this->table = $table;
    }

    public function indexAction()
    {
        return new ViewModel([
            'pokemons' => $this->table->fetchAll(),
        ]);
    }

    public function addAction()
    {
    }

    public function editAction()
    {
    }

    public function deleteAction()
    {
    }
}