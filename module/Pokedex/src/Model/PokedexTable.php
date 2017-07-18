<?php

namespace Pokedex\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class PokedexTable
{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        return $this->tableGateway->select();
    }

    public function getPokemon($id)
    {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id' => $id]);
        $row = $rowset->current();
        if (! $row) {
            throw new RuntimeException(sprintf(
                'Could not find row with identifier %d',
                $id
            ));
        }

        return $row;
    }

    public function savePokemon(Pokemon $pokedex)
    {
        $data = [
            'idNational' => $pokedex->idNational,
            'name'  => $pokedex->name,
            'description'  => $pokedex->description,
            'type'  => $pokedex->type,
            'type2'  => $pokedex->type2,
            'evolved'  => $pokedex->evolved,
            'img'  => $pokedex->img,
            'isActive'  => $pokedex->isActive,
        ];

        $id = (int) $pokedex->id;

        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }

        if (! $this->getPokedex($id)) {
            throw new RuntimeException(sprintf(
                'Cannot update pokemon with identifier %d; does not exist',
                $id
            ));
        }

        $this->tableGateway->update($data, ['id' => $id]);
    }

    public function deletePokemon($id)
    {
        $this->tableGateway->delete(['id' => (int) $id]);
    }
}
