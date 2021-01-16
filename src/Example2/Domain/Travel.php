<?php

declare(strict_types=1);

namespace App\Example2\Domain;

class Travel
{
    public function __construct(private string $from, private string $to) {}

    public function from(): string
    {
        return $this->from;
    }

    public function to(): string
    {
        return $this->to;
    }
}