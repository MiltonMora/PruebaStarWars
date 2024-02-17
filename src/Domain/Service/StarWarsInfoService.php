<?php

namespace App\Domain\Service;

use GuzzleHttp\Client;

class StarWarsInfoService
{
    private Client $httpClient;

    public function __construct()
    {
        $this->httpClient = new Client();
    }

    public function getPeopleInfo()
    {
        $people = $this->httpClient->request('GET', 'https://swapi.dev/api/people');

        return json_decode($people->getBody()->getContents(), true);

    }

    public function getFilms()
    {
        $people = $this->httpClient->request('GET', 'https://swapi.dev/api/films');

        return json_decode($people->getBody()->getContents(), true);

    }



}
