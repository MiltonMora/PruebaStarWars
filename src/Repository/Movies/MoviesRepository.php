<?php

namespace App\Repository\Movies;

use App\Entity\Movies;
use App\Repository\BaseRepository;

class MoviesRepository extends BaseRepository implements \MovieInterface
{


    protected static function entityClass(): string
    {
        return Movies::class;
    }

    public function store(Movies $movies): void
    {
        $this->saveEntity($movies);
    }
}
