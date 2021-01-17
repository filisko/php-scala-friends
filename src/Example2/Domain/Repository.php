<?php

declare(strict_types=1);

namespace App\Example2\Domain;

interface Repository
{
    public function save(Entity $entity): Entity;
}
