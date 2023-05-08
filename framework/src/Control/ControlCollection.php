<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Control;

use Legobuilder\Framework\Collection\AbstractCollection;
use Legobuilder\Framework\Control\Exception\UnexpectedTypeException;

final class ControlCollection extends AbstractCollection implements ControlCollectionInterface
{
    /**
     * Add widget defition to collection.
     *
     * @param string $id
     * @param ControlInterface $type
     * @param ?array $options
     * @return self
     */
    public function add($id, $type, ?array $options = []): self
    {
        $this->items[$id] = [$type, $options];

        return $this;
    }

    /**
     * Remove widget defition from collection.
     *
     * @param string $id
     * @return self
     */
    public function remove(string $id): self
    {
        unset($this->items[$id]);

        return $this;
    }

    /**
     * Retrieve all the keys (IDS) of controls in the collection.
     * 
     * @return array Keys
     */
    public function getKeys(): array
    {
        return array_keys($this->items);
    }
}
