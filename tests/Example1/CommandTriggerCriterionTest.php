<?php

declare(strict_types=1);

namespace Tests\Example1;

use App\Example1\Command;
use App\Example1\CommandTriggerCriterion;
use App\Example1\CommandType\AndroidCommandType;
use PHPUnit\Framework\TestCase;

class CommandTriggerCriterionTest extends TestCase
{
    public function test_initial_position_is_well_set()
    {
        $subject = new CommandTriggerCriterion();

        $result = $subject->performCriterionEvaluation(new Command('android', new AndroidCommandType()), 'android');

//        $this->assertEquals(
//            [
//                new
//            ],
//            $result
//        );
    }
}
