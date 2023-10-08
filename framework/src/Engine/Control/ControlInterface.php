<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine\Control;

interface ControlInterface
{
    /**
     * Get unique control identifier.
     *
     * @return string
     */
    public function getId(): string;

    /**
     * Get unique control type.
     *
     * @return string
     */
    public function getType(): string;

    /**
     * Get column related options.
     *
     * @return array
     */
    public function getOptions();

    /**
     * @param string $name
     *
     * @return mixed
     */
    public function getOption(string $name);

    /**
     * Set column options.
     *
     * @param array $options
     *
     * @return self
     */
    public function setOptions(array $options): self;

    /**
     * Get the constraints for the control validation value.
     *
     * @return array
     */
    public function getConstraints(): array;
}
