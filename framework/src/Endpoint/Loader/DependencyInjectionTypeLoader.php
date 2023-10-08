<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Loader;

use GraphQL\Type\Definition\Type;
use Legobuilder\Framework\Endpoint\Exception\EndpointTypeException;
use Symfony\Component\DependencyInjection\ServiceLocator;

class DependencyInjectionTypeLoader implements TypeLoaderInterface
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
     */
    public function getByClassName(string $className): ?Type
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
     */
    public function getByTypeName(string $typeName): ?Type
    {
        $typesLoaded = $this->typeLocator->getProvidedServices();

        foreach ($typesLoaded as $typeClassName => $_) {
            if (substr(strrchr($typeClassName, '\\'), 1) == $typeName . 'Type') {
                return $this->getByClassName($typeClassName);
            }
        }

        return null;
    }
}
