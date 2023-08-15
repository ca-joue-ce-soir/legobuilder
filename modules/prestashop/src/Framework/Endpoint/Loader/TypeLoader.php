<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Loader;

class TypeLoader implements TypeLoaderInterface
{
    /**
     * @var array
     */
    private $types;

    public function get(string $typeName)
    {
        
    }

    public function register(string $typeClass): self
    {
        if (!is_subclass_of($typeClass, GraphQL\Type\Definition\Type::class)) {
            return $this;
        }

        $this->types[$typeClass] = new $typeClass($this);

        return $this;
    }
}