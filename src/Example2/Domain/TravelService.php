<?php

declare(strict_types=1);

namespace App\Example2\Domain;

interface TravelService
{
    public function createTravelRequest(string $from, string $to): callable;
}