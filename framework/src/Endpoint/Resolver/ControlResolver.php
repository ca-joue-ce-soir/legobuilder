<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Resolver;

use Legobuilder\Framework\Control\ControlInterface;
use Legobuilder\Framework\Control\Registry\ControlRegistryInterface;

class ControlResolver
{
    /**
     * @var ControlRegistryInterface
     */
    private $controlRegistry;

    public function __construct(ControlRegistryInterface $controlRegistry)
    {
        $this->controlRegistry = $controlRegistry;
    }

    /**
     * Retrieves the controls from the control registry.
     *
     * @return array The controls retrieved from the control registry.
     */
    public function getControls(): array
    {
        return $this->controlRegistry->getControls();
    }

    /**
     * Retrieves a ControlInterface object from the control registry
     * based on the provided ID.
     *
     * @param mixed $rootValue The root value.
     * @param array $args An array of arguments (id (int) The ID of the control).
     * @throws \Exception If the control does not exist.
     * @return ControlInterface|null The retrieved ControlInterface object, or null if no control is found.
     */
    public function getControl($rootValue, array $args): ?ControlInterface
    {
        return $this->controlRegistry->getControl($args['id']);
    }
}