<?php

namespace Pokedex\Model;

class Pokedex
{
    public $id;
    public $idNational;
    public $name;
    public $description;
    public $type;
    public $type2;
    public $evolved;
    public $img;
    public $isActive;

    public function exchangeArray(array $data)
    {
        $this->id           = !empty($data['id']) ? $data['id'] : null;
        $this->idNational   = !empty($data['idNational']) ? $data['idNational'] : null;
        $this->name         = !empty($data['name']) ? $data['name'] : null;
        $this->description  = !empty($data['description']) ? $data['description'] : "Pas de description";
        $this->type         = !empty($data['type']) ? $data['type'] : null;
        $this->type2        = !empty($data['type2']) ? $data['type2'] : null;
        $this->evolved      = !empty($data['evolved']) ? $data['evolved'] : null;
        $this->img          = !empty($data['img']) ? $data['img'] : "http://www.tracesecritesnews.fr/img/default-thumb.gif";
        $this->isActive     = !empty($data['isActive']) ? $data['isActive'] : 0;
    }
}