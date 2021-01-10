<?php

require_once __DIR__.'/../vendor/autoload.php';

use App\MainCommand;
use Symfony\Component\Console\Application;

$application = new Application('Scala test', '1.0.0');
$command = new MainCommand();

$application->add($command);
$application->setDefaultCommand($command->getName(), true);
$application->run();

