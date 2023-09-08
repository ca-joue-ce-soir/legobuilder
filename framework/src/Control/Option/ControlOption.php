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
     * @var boolean
     */
    private $required;

    /**
     * @var callable
     */
    private $validator;

    /**
     * Set the default value of the control option.
     *
     * @param  mixed $default The default value
     * @return self
     */
    public function setDefault($default = null): self
    {
        $this->default = $default;

        return $this;
    }

    /**
     * Set the required flag of the control option.
     *
     * @param  bool $required The required flag
     * @return self
     */
    public function setRequired(bool $required): self
    {
        $this->required = $required;

        return $this;
    }

    /**
     * Set the validator function of the control option.
     *
     * @param  callable $validator The validator function
     * @return self
     */
    public function setValidator(callable $validator): self
    {
        $this->validator = $validator;

        return $this;
    }

    /**
     * Check if the control option is required.
     *
     * @return bool True if the control option is required, false otherwise
     */
    public function isRequired(): bool
    {
        return $this->required;
    }

    /**
     * Get the validator function of the control option.
     *
     * @return callable The validator function
     */
    public function getValidator(): callable
    {
        return $this->validator;
    }

    /**
     * Get the default value of the control option.
     *
     * @return mixed The default value
     */
    public function getDefault(): mixed
    {
        return $this->default;
    }
}
