<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine\Control\Option;

use Legobuilder\Framework\Engine\Constraint\ConstraintInterface;

interface ControlOptionInterface
{
    /**
     * Set the default value for the control option.
     *
     * @param mixed $default
     * @return self
     */
    public function setDefault($default = null): self;

    /**
     * Get the default value of Control.
     *
     * @return mixed
     */
    public function getDefault(): mixed;

    /**
     * Get the value of identifier
     *
     * @return  string
     */
    public function getIdentifier(): string;

    /**
     * Set the constraints for the control option.
     *
     * @param array $contraints
     * @return self
     */
    public function setConstraints(array $contraints): self;

    /**
     * Get the list of constraints.
     *
     * @return ConstraintInterface[]
     */
    public function getConstraints(): array;

    /**
     * Retrieve if the control option is required.
     */
    public function isRequired(): bool;

    /**
     * Set if control option is required.
     */
    public function setRequired(bool $required): self;
}
