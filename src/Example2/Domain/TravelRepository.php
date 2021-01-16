<?php

declare(strict_types=1);

namespace App\Example2\Domain;

abstract class TravelRepository implements Repository
{
    public abstract function save(Travel $travel): Travel;
}