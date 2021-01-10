<?php

declare(strict_types=1);

namespace Tests;

use App\Command;
use App\CommandTriggerCriterion;
use App\CommandType\AndroidCommandType;
use PHPUnit\Framework\TestCase;

class CommandTriggerCriterionTest extends TestCase
{
    public function test_initial_position_is_well_set()
    {
        $subject = new CommandTriggerCriterion();

        $result = $subject->performCriterionEvaluation(new Command('android', new AndroidCommandType()), 'android');

        var_dump($result);
//        $this->assertEquals(
//            [
//                new
//            ],
//            $result
//        );
    }
}
