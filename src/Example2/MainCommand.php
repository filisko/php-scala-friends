<?php

declare(strict_types=1);

namespace App\Example2;

use App\Example2\Domain\Travel;
use App\Example2\Infrastructure\TravelRepositoryMysql;
use App\Example2\Infrastructure\TravelServiceImpl;
use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MainCommand extends SymfonyCommand
{
    protected static $defaultName = 'example2';

    protected function configure()
    {
        $this
            // the short description shown while running "php bin/console list"
            ->setDescription('Run Scala dependency injection example')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $travel  = (new TravelServiceImpl)->createTravelRequest('Estepona', 'Málaga');
        $database = new TravelRepositoryMysql();

        dump($travel);
        
        $savedTravel = $travel($database);

        dump($savedTravel);

        return SymfonyCommand::SUCCESS;
    }
}
