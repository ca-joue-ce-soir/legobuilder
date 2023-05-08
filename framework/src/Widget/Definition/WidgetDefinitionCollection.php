<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Widget\Definition;

use Legobuilder\Framework\Collection\AbstractCollection;

final class WidgetDefinitionCollection extends AbstractCollection implements WidgetDefinitionCollectionInterface
{
    /**
     * Add Widget defition to collection.
     *
     * @param WidgetDefinitionInterface $defition
     * @return self
     */
    public function add(WidgetDefinitionInterface $defition): self
    {
        $this->items[$defition->getId()] = $defition;

        return $this;
    }

    /**
     * Remove Widget defition from collection.
     *
     * @param string $id
     * @return self
     */
    public function remove(string $id): self
    {
        unset($this->items[$id]);

        return $this;
    }
}
