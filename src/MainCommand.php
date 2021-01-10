<?php

declare(strict_types=1);

namespace App;

use App\CommandType\AndroidCommandType;
use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MainCommand extends SymfonyCommand
{
    protected static $defaultName = 'app:run';

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $subject = new CommandTriggerCriterion();

        $result = $subject->performCriterionEvaluation(new Command('android', new AndroidCommandType()), 'android');

        var_dump($result);

        return SymfonyCommand::SUCCESS;
    }
}
