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
     * 
     *
     * @return ControlInterface[] Controls
     */
    public function getControls(): array
    {
        return $this->controlRegistry->getControls();
    }
}