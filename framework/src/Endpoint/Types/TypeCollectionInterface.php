<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Types;

use Countable;
use GraphQL\Type\Definition\Type;
use Iterator;

interface TypeCollectionInterface extends Iterator, Countable
{
    /**
     * Add type to collection.
     *
     * @param Type $type
     *
     * @return self
     */
    public function add(Type $type): self;
}
