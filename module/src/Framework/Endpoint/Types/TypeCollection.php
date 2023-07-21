<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Types;

use GraphQL\Type\Definition\Type;
use Legobuilder\Framework\Collection\AbstractCollection;

final class TypeCollection extends AbstractCollection implements TypeCollectionInterface
{
    public function add(Type $type): self
    {
        $this->items[] = $type;
        return $this;
    }
}
