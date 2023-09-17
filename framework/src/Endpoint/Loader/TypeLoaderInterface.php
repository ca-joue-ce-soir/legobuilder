<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Loader;

use GraphQL\Type\Definition\ObjectType;

interface TypeLoaderInterface
{
    /**
     * Retrieves an object type by class name.
     *
     * @param string $className The class name of the object type
     * @return ObjectType The object type
     */
    public function getByTypeName(string $typeName): ObjectType;

    /**
     * Retrieves an object type by type name.
     *
     * @param string $typeName The type name of the object type
     * @return ObjectType The object type
     */
    public function getByClassName(string $className): ObjectType;
}
