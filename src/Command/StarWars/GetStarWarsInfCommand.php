<?php

namespace App\Command\StarWars;

use App\Domain\Service\StarWarsInfoService;
use App\Entity\Characters;
use App\Entity\Movies;
use App\Repository\Character\CharacterRepository;
use App\Repository\Movies\MoviesRepository;
use GuzzleHttp\Client;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'GetStarWarsInfCommand',
    description: 'Obtine informacion de la api de star Wars y la guarda en nuestas BD',
)]
class GetStarWarsInfCommand extends Command
{

    private StarWarsInfoService $starWarsInfoService;

    private CharacterRepository $charactersRepository;

    private MoviesRepository $moviesRepository;


    public function __construct(
        StarWarsInfoService $starWarsInfoService,
        CharacterRepository $charactersRepository,
        MoviesRepository $moviesRepository
    ) {
        $this->starWarsInfoService = $starWarsInfoService;
        $this->charactersRepository = $charactersRepository;
        $this->moviesRepository = $moviesRepository;
        parent::__construct();

    }


    protected function configure(): void
    {
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $films = $this->starWarsInfoService->getFilms();
        foreach ($films['results'] as $film) {
            $movie = new Movies();
            $movie->setName($film['title']);
            $this->moviesRepository->store($movie);
        }

        $people = $this->starWarsInfoService->getPeopleInfo();
        foreach ($people['results'] as $person) {
            $character = new Characters();
            $character->setName($person['name']);
            $character->setMass($person['mass']);
            $character->setHeight($person['height']);
            $character->setGender($person['gender']);
            $this->charactersRepository->store($character);
        }


        $io->success('Final.');

        return Command::SUCCESS;
    }
}
