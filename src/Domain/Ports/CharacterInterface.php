<?php

use App\Entity\Characters;

interface CharacterInterface
{
    public function store(Characters $characters): void;

}
