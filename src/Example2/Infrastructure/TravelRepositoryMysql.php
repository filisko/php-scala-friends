<?php

declare(strict_types=1);

namespace App\Example2\Infrastructure;

use App\Example2\Domain\Travel;
use App\Example2\Domain\TravelRepository;

class TravelRepositoryMysql extends TravelRepository
{
    public function save(Travel $travel): Travel
    {
        printf('saving a Travel from %s to %s' . PHP_EOL, $travel->from(), $travel->to());
        return $travel;
    }
}