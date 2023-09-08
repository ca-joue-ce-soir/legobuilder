<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Control\Option;

interface ControlOptionInterface
{
    /**
     * Set the default value for the control option.
     *
     * @param  mixed $default
     * @return self
     */
    public function setDefault($default = null): self;

    /**
     * Indicate whether the control option are necessary or not.
     *
     * @param  bool $required
     * @return self
     */
    public function setRequired(bool $required): self;

    /**
     * Specify the validation method (which can be a function name or a closure) that
     * validates whether the given control value is correct.
     *
     * @param  callable $validator
     * @return self
     */
    public function setValidator(callable $validator): self;

    /**
     * Check if the control option is required.
     *
     * @return bool Required
     */
    public function isRequired(): bool;

    /**
     * Get the validator of Control.
     * 
     * @return callable
     */
    public function getValidator(): callable;

    /**
     * Get the default value of Control.
     * 
     * @return mixed
     */
    public function getDefault(): mixed;
}
