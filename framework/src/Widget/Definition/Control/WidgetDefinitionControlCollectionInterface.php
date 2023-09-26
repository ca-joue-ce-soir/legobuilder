<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Widget\Definition\Control;

use Countable;
use Iterator;

interface WidgetDefinitionControlCollectionInterface extends Iterator, Countable
{
    /**
     * Add control to collection.
     *
     * @param string        $id
     * @param class-string  $type
     * @param array         $options
     *
     * @return self
     */
    public function add($id, $type, array $options = []): self;

    /**
     * Remove control from collection.
     *
     * @param  string $id
     * @return self
     */
    public function remove(string $id): self;

    /**
     * Retrieve all the keys (IDS) of controls in the collection.
     *
     * @return array Keys
     */
    public function getKeys(): array;
}
