<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Loader;

use GraphQL\Type\Definition\Type;

interface TypeLoaderInterface
{
    /**
     * Retrieves an object type by class name.
     *
     * @param string $typeName The class name of the object type
     * @return ?Type The object type
     */
    public function getByTypeName(string $typeName): ?Type;

    /**
     * Retrieves an object type by type name.
     *
     * @param string $className The type name of the object type
     * @return ?Type The object type
     */
    public function getByClassName(string $className): ?Type;
}
