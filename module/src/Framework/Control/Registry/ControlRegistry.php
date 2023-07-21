<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Control\Registry;

use Legobuilder\Framework\Control\ControlInterface;

class ControlRegistry implements ControlRegistryInterface
{
    /**
     * @var array
     */
    private $registeredControls;

    public function __construct()
    {
        $this->registeredControls = [];
    }

    /**
     * Get Widgets registered.
     *
     * @return array
     */
    public function getRegisteredControls(): array
    {
        return $this->registeredControls;
    }

    /**
     * Register a new control.
     * 
     * @param ControlInterface $control
     */
    public function registerControl(ControlInterface $control): self
    {
        $this->registeredControls[get_class($control)] = $control;

        return $this;
    }
}