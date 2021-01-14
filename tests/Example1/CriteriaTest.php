<?php

declare(strict_types=1);

namespace Tests\Example1;

use App\Example1\Command;
use App\Example1\Criteria;
use PHPUnit\Framework\TestCase;

class CriteriaTest extends TestCase
{
    public function test_initial_position_is_well_set()
    {
        $criteria = new Criteria(new Command(), 'whatever');
        var_dump($criteria());
    }
}
