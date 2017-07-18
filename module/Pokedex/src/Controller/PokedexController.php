<?php

namespace Pokedex\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class PokedexController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
}
