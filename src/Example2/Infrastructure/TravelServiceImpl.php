<?php

declare(strict_types=1);

namespace App\Example2\Infrastructure;

use App\Example2\Domain\Travel;
use App\Example2\Domain\TravelRepository;
use App\Example2\Domain\TravelService;

class TravelServiceImpl implements TravelService
{
    public function createTravelRequest(string $from, string $to): callable
    {
        return function(TravelRepository $travelRepository) use($from, $to): Travel {
            return $travelRepository->save(new Travel($from, $to));
        };
    }
}