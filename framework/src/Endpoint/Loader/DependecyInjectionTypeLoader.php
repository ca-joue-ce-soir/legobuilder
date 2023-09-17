<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Loader;

use GraphQL\Type\Definition\ObjectType;
use Legobuilder\Framework\Endpoint\Exception\EndpointTypeException;
use Symfony\Component\DependencyInjection\ServiceLocator;

class DependecyInjectionTypeLoader implements TypeLoaderInterface
{
    /**
     * @var ServiceLocator
     */
    private $typeLocator;

    /**
     * Constructor method that sets the `typeLocator` property.
     *
     * @param ServiceLocator $typeLocator The service locator instance
     */
    public function __construct(ServiceLocator $typeLocator)
    {
        $this->typeLocator = $typeLocator;
    }

    /**
     * Retrieves an object type by class name.
     *
     * {@inheritdoc}
     * @throws EndpointTypeException If the object type is not found in the service locator
     */
    public function getByClassName(string $className): ObjectType
    {
        if (!$this->typeLocator->has($className)) {
            throw new EndpointTypeException($className);
        }

        return $this->typeLocator->get($className);
    }

    /**
     * Retrieves an object type by type name.
     *
     * {@inheritdoc}
     * @throws EndpointTypeException If the object type is not found in the service locator
     */
    public function getByTypeName(string $typeName): ObjectType
    {
        $className = 'Legobuilder\Framework\Endpoint\Type\\' . $typeName . 'Type';

        return $this->getByClassName($className);
    }
}
