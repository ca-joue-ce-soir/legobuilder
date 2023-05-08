<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Zone;

use Legobuilder\Framework\Collection\AbstractCollection;

final class ZoneCollection extends AbstractCollection implements ZoneCollectionInterface
{
    public function add(string $id, string $classType)
    {
        $this->items[$id] = $classType;
    }
}
