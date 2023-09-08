<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Loader;

use GraphQL\Type\Definition\Type;

class TypeLoader implements TypeLoaderInterface
{
    /**
     * @var array $types An array that stores the registered types.
     */
    private $types;

    /**
     * Returns the type with the given name from the registered types.
     *
     * @param  string $typeName The name of the type to get.
     * @return mixed The type with the given name.
     */
    public function get(string $typeName)
    {
        return $this->types[$typeName];
    }

    /**
     * Registers a new type by creating an instance of the provided type class and storing it in the types array.
     *
     * @param  string $typeClass The class name of the type to register.
     * @return self The TypeLoader instance.
     */
    public function register(string $typeClass): self
    {
        if (!is_subclass_of($typeClass, Type::class)) {
            return $this;
        }

        $this->types[$typeClass] = new $typeClass($this);

        return $this;
    }
}
