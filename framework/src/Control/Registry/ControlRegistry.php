<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Control\Registry;

use Legobuilder\Framework\Control\ControlInterface;

class ControlRegistry implements ControlRegistryInterface
{
    /**
     * @var ControlInterface[]
     */
    private $controls;

    public function __construct()
    {
        $this->controls = [];
    }

    /**
     * Get Widgets registered.
     *
     * {@inheritdoc}
     */
    public function getControls(): array
    {
        return $this->controls;
    }

    /**
     * Retrieves a control of the specified type.
     *
     * @param string $controlType The type of control to retrieve.
     * @return ControlInterface|null The control of the specified type, or null if it does not exist.
     */
    public function getControl(string $controlType): ?ControlInterface
    {
        return $this->controls[$controlType];
    }

    /**
     * Retrieves a control by its class.
     *
     * @param string $controlClass The class name of the control to retrieve.
     * @return ?ControlInterface Returns the control if found, or null if not found.
     */
    public function getControlByClass(string $controlClass): ?ControlInterface
    {
        foreach ($this->controls as $control) {
            if ($controlClass === get_class($control)) {
                return $control;
            }
        }

        return null;
    }

    /**
     * Register a new control.
     *
     * {@inheritdoc}
     */
    public function registerControl(ControlInterface $control): self
    {
        $this->controls[$control->getType()] = $control;

        return $this;
    }
}
