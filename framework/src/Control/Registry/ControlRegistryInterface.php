<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Control\Registry;

use Legobuilder\Framework\Control\ControlInterface;

interface ControlRegistryInterface
{
    /**
     * Get Controls registered.
     *
     * @return array
     */
    public function getRegisteredControls(): array;

    /**
     * Register a new control.
     * 
     * @param ControlInterface $control
     */
    public function registerControl(ControlInterface $control): self;
}
