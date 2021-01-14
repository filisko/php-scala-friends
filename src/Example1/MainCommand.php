<?php

declare(strict_types=1);

namespace App\Example1;

use App\Example1\CommandType\AndroidCommandType;
use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MainCommand extends SymfonyCommand
{
    protected static $defaultName = 'example1';

    protected function configure()
    {
        $this
            // the short description shown while running "php bin/console list"
            ->setDescription('Run Scala example 1')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $subject = new CommandTriggerCriterion();

        $result = $subject->performCriterionEvaluation(new Command('android', new AndroidCommandType()), 'android');

        var_dump($result);

        return SymfonyCommand::SUCCESS;
    }
}
