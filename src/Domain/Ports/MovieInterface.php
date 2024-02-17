<?php


use \App\Entity\Movies;

interface MovieInterface
{
    public function store(Movies $movies): void;

}
