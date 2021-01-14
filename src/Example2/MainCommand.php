<?php

declare(strict_types=1);

namespace App\Example2;

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

        var_dump(123);

        return SymfonyCommand::SUCCESS;
    }
}
