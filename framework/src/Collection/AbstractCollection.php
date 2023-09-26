<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Collection;

use Countable;
use Iterator;
use Traversable;

abstract class AbstractCollection implements Iterator, Countable, Traversable
{
    /**
     * @var array
     */
    protected $items = [];

    /**
     * Get the current item in the collection.
     *
     * @return mixed
     */
    public function current()
    {
        return current($this->items);
    }

    /**
     * Move the internal pointer to the next item in the collection.
     *
     * @return void
     */
    public function next(): void
    {
        next($this->items);
    }

    /**
     * Get the key of the current item in the collection.
     *
     * @return mixed
     */
    public function key()
    {
        return key($this->items);
    }

    /**
     * Check if the current item in the collection is valid.
     *
     * @return bool
     */
    public function valid(): bool
    {
        return false !== $this->current();
    }

    /**
     * Reset the internal pointer to the first item in the collection.
     *
     * @return void
     */
    public function rewind(): void
    {
        reset($this->items);
    }

    /**
     * Get the count of items in the collection.
     *
     * @return int
     */
    public function count(): int
    {
        return count($this->items);
    }
}
