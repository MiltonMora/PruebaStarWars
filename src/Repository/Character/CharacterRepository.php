<?php

namespace App\Repository\Character;

use App\Entity\Characters;
use App\Repository\BaseRepository;

class CharacterRepository extends BaseRepository implements \CharacterInterface
{


    protected static function entityClass(): string
    {
        return Characters::class;
    }

    public function store(Characters $characters): void
    {
        $this->saveEntity($characters);
    }
}
