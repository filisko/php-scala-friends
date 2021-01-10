<?php

declare(strict_types=1);

namespace App;

use App\CommandType\CliCommandType;
use App\CommandType\CommandType;

class Command
{
    /** @var string */
    private $keyword;

    /** @var CommandType */
    private $commandType;

    /** @var bool */
    private $readyToTrigger;

    public function __construct(
        string $keyword = 'default',
        CommandType $commandType = null,
        bool $readyToTrigger = false
    ) {
        $this->keyword = $keyword;
        $this->commandType = !$commandType ? new CliCommandType() : $commandType;
        $this->readyToTrigger = $readyToTrigger;
    }

    public function keyword(): string
    {
        return $this->keyword;
    }

    public function commandType(): CommandType
    {
        return $this->commandType;
    }

    public function readyToTrigger(): bool
    {
        return $this->readyToTrigger;
    }
}
