<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Collection;

use Legobuilder\Framework\Collection\Exception\ItemNotFoundException;

abstract class AbstractOrderedCollection extends AbstractCollection
{
    /**
     * @internal
     */
    public const POSITION_AFTER = 'after';

    /**
     * @internal
     */
    public const POSITION_BEFORE = 'before';

    /**
     * Inserts an item by position in the collection.
     *
     * @param string $key The key of the item to insert.
     * @param mixed $item The item to insert.
     * @param string $position The position at which to insert the item.
     *
     * @throws ItemNotFoundException If the item with the given key does not exist.
     */
    protected function insertByPosition(string $key, mixed $item, string $position)
    {
        if (!isset($this->items[$key])) {
            throw new ItemNotFoundException($key);
        }

        $existingControlKeyPosition = (int) array_search($key, array_keys($this->items));

        if (self::POSITION_AFTER === $position) {
            ++$existingControlKeyPosition;
        }

        $items = array_slice($this->items, 0, $existingControlKeyPosition, true)
            + [$item->getId() => $item]
            + array_slice($this->items, $existingControlKeyPosition, null, true)
        ;

        $this->items = $items;
    }
}
