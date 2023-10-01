<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Control\Registry;

use Legobuilder\Framework\Control\ControlInterface;

interface ControlRegistryInterface
{
    /**
     * Get Controls registered.
     *
     * @return ControlInterface[]
     */
    public function getControls(): array;

    public function getControl(string $controlType): ?ControlInterface;

    public function getControlByClass(string $controlClass): ?ControlInterface;

    /**
     * Register a new control.
     *
     * @param ControlInterface $control
     */
    public function registerControl(ControlInterface $control): self;
}
