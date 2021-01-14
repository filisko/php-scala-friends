<?php

require_once __DIR__.'/../vendor/autoload.php';

use App\Example1\MainCommand as Example1;
use App\Example2\MainCommand as Example2;
use Symfony\Component\Console\Application;

$application = new Application('Scala test', '1.0.0');

$application->add(new Example1());
$application->add(new Example2());

$application->run();

