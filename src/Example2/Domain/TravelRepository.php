<?php

declare(strict_types=1);

namespace App\Example2\Domain;

abstract class TravelRepository implements Repository
{
    abstract public function save(Travel|Entity $travel): Travel;
}