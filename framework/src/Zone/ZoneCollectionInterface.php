<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Zone;

interface ZoneCollectionInterface
{
    public function add(string $id, string $classType);
}
