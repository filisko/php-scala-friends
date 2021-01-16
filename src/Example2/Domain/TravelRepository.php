<?php

declare(strict_types=1);

namespace App\Example2\Domain;

interface TravelRepository
{
    public function save(Travel $travel): Travel;
}