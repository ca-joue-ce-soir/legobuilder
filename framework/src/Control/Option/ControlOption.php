<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Control\Option;

class ControlOption implements ControlOptionInterface
{
    /**
     * @var mixed
     */
    private $default;

    /**
     * @var bool
     */
    private $required;

    /**
     * @var callable
     */
    private $validator;

    /**
     * Set the value of default
     *
     * @param $default
     * @return self
     */
    public function setDefault($default = null): self
    {
        $this->default = $default;

        return $this;
    }

    /**
     * Set the value of required
     *
     * @param bool $required
     * @return self
     */
    public function setRequired(bool $required): self
    {
        $this->required = $required;

        return $this;
    }

    /**
     * Set the value of validator
     *
     * @param callable $validator
     * @return self
     */
    public function setValidator(callable $validator = null): self
    {
        $this->validator = $validator;

        return $this;
    }

    /**
     * Check if the control option is required.
     *
     * @return bool Required
     */
    public function isRequired(): bool
    {
        return $this->required;
    }

    public function getValidator(): callable
    {
        return $this->validator;
    }

    public function getDefault()
    {
        return $this->default;
    }
}
