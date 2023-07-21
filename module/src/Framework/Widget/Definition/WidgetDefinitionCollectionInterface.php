<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Widget\Definition;

use Countable;
use Iterator;

interface WidgetDefinitionCollectionInterface extends Iterator, Countable
{
    /**
     * Add Widget definition to collection.
     *
     * @param WidgetDefinitionInterface $definition
     * @return self
     */
    public function add(WidgetDefinitionInterface $definition): self;

    /**
     * Remove Widget definition from collection.
     *
     * @param string $id
     * @return self
     */
    public function remove(string $id): self;
}
