<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine\Control\Option;

class ControlOption implements ControlOptionInterface
{
    /**
     * @var string
     */
    private $identifier;

    /**
     * @var mixed
     */
    private $default = null;

    /**
     * @var bool
     */
    private $required = false;

    /**
     * @var array
     */
    public $constraints = [];

    public function __construct(string $identifier)
    {
        $this->identifier = $identifier;
    }

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
     * Get the default value of the control option.
     *
     * @return mixed The default value
     */
    public function getDefault(): mixed
    {
        return $this->default;
    }

    /**
     * Get the value of identifier
     *
     * @return  string
     */
    public function getIdentifier(): string
    {
        return $this->identifier;
    }

    /**
     * Get the value of constraints
     *
     * @return  array
     */
    public function getConstraints(): array
    {
        return $this->constraints;
    }

    /**
     * Set the value of constraints
     *
     * @param  array  $constraints
     *
     * @return  self
     */
    public function setConstraints(array $constraints): self
    {
        $this->constraints = $constraints;

        return $this;
    }

    /**
     * Get the value of required
     *
     * @return  bool
     */
    public function isRequired(): bool
    {
        return $this->required;
    }

    /**
     * Set the value of required
     *
     * @param  bool  $required
     *
     * @return  self
     */
    public function setRequired(bool $required): self
    {
        $this->required = $required;

        return $this;
    }
}
