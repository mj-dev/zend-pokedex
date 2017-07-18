<?php

namespace Pokedex\Controller;

use Pokedex\Model\Pokedex;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Pokedex\Form\Add;

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
        $form = new Add();

        $variables = [
            'form' => $form
        ];

//        if ($this->request->isPost()) { // if form is submitted
//            $blogPost = new Post();
//            $form->bind($blogPost);
//
//            $form->setInputFilter(new AddPost());
//            $data = $this->request->getPost(); // key value array
//            $form->setData($data);
//            if ($form->isValid()) {
//                $this->blogService->save($blogPost);
//                // @todo insert article into db
//                return $this->redirect()->toRoute('blog_index');
//            }
//        }

        return new ViewModel($variables);
    }

    public function editAction()
    {
    }

    public function deleteAction()
    {
    }
}
