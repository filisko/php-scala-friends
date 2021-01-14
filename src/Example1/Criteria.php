<?php

declare(strict_types=1);

namespace App\Example1;

use App\Example1\CommandType\CliCommandType;
use App\Example1\CommandType\CommandType;

class Criteria
{
    /** @var Command */
    private $command;

    /** @var string */
    private $keyword;

    public function __construct(Command $command, string $keyword)
    {
        $this->command = $command;
        $this->keyword = $keyword;
    }

    /**
     * @return Command[]
     */
    public function __invoke(): array
    {

    }

    public function command(): Command
    {
        return $this->command;
    }

    public function keyword(): string
    {
        return $this->keyword;
    }
}
