<?php

declare(strict_types=1);

namespace App\Example1;

use App\Example1\CommandType\AndroidCommandType;
use App\Example1\CommandType\CliCommandType;

class CommandTriggerCriterion
{
    private $criterions;

    public function __construct()
    {
        $defaultCommand = new Command();

        $this->criterions = function() use($defaultCommand): array {
            $triggerCommandCriterion0 = function(Command $aCommand, string $aKeyword) use($defaultCommand) {
                return $aCommand->keyword() === $aKeyword
                        ? new Command($aKeyword, new CliCommandType(), true)
                        : $defaultCommand;
            };

            $triggerCommandCriterion1 = function(Command $aCommand, string $aKeyword) use($defaultCommand) {
                return $aCommand->keyword() !== $aKeyword
                        ? new Command($aKeyword, new AndroidCommandType(), false)
                        : $defaultCommand;
            };

            return [$triggerCommandCriterion0, $triggerCommandCriterion1];
        };
    }

    private function evaluateCriterionDefinition(Command $aCommand, string $aKeyword)
    {
        return function(array $criterias) use($aCommand, $aKeyword) {
            return array_map(function($criteria) use($aCommand, $aKeyword) {
               return $criteria($aCommand, $aKeyword);
            }, $criterias);
        };
    }

    /**
     * @return Command[]
     */
    public function performCriterionEvaluation(Command $aCommand, string $aKeyword): array
    {
        $criterions = $this->criterions;
        return $this->evaluateCriterionDefinition($aCommand, $aKeyword)($criterions($aCommand, $aKeyword));
    }
}
