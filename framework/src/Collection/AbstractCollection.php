<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Collection;

use Countable;
use Iterator;

abstract class AbstractCollection implements Iterator, Countable
{
    /**
     * @var array
     */
    protected $items = [];

    /**
     * @inheritdoc
     */
    public function current()
    {
        return current($this->items);
    }

    /**
     * @inheritdoc
     */
    public function next(): void
    {
        next($this->items);
    }

    /**
     * @inheritdoc
     */
    public function key(): mixed
    {
        return key($this->items);
    }

    /**
     * @inheritdoc
     */
    public function valid(): bool
    {
        return false !== $this->current();
    }

     /**
      * {@inheritdoc}
      */
    public function rewind(): void
    {
        reset($this->items);
    }

    /**
     * {@inheritdoc}
     */
    public function count(): int
    {
        return count($this->items);
    }
}
