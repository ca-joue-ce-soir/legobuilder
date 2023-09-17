<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Loader;

use GraphQL\Type\Definition\ObjectType;

interface TypeLoaderInterface
{
    public function get(string $typeName): ObjectType;
}
