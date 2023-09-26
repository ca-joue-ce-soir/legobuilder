<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Widget\Definition\Control;

use Legobuilder\Framework\Collection\AbstractCollection;

final class WidgetDefinitionControlCollection extends AbstractCollection implements WidgetDefinitionControlCollectionInterface
{
    /**
     * Add widget defition to collection.
     *
     * @param  string           $id
     * @param  class-string $type
     * @param  ?array           $options
     * @return self
     */
    public function add($id, $type, ?array $options = []): self
    {
        $this->items[$id] = [
            'type' => $type,
            'options' => $options,
        ];

        return $this;
    }

    /**
     * Remove widget defition from collection.
     *
     * @param  string $id
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
