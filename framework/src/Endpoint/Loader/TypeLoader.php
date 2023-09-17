<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Loader;

use GraphQL\Type\Definition\ObjectType;
use Legobuilder\Framework\Endpoint\Exception\EndpointTypeException;
use Symfony\Component\DependencyInjection\ServiceLocator;

class TypeLoader implements TypeLoaderInterface
{
    /**
     * @var ServiceLocator
     */
    private $typeLocator;

    public function __construct(ServiceLocator $typeLocator)
    {
        $this->typeLocator = $typeLocator;
    }

    /**
     * Returns the type with the given name from the registered types.
     *
     * @param  string $typeName The name of the type to get.
     * @return mixed The type with the given name.
     */
    public function get(string $typeName): ObjectType
    {
        if (!$this->typeLocator->has($typeName)) {
            $typeName = 'Legobuilder\Framework\Endpoint\Type\\' . $typeName . 'Type';

            if (!$this->typeLocator->has($typeName)) {
                throw new EndpointTypeException($typeName);
            }
        }

        return $this->typeLocator->get($typeName);
    }
}
