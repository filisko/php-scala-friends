<?php

declare(strict_types=1);

namespace Tests;

use App\Command;
use App\CommandTriggerCriterion;
use App\Criteria;
use PHPUnit\Framework\TestCase;

class CriteriaTest extends TestCase
{
    public function test_initial_position_is_well_set()
    {
        $criteria = new Criteria(new Command(), 'whatever');
        var_dump($criteria());
    }
}
