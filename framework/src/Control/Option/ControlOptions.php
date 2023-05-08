<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Control\Option;

class ControlOptions
{
    private $options;

    public function __construct()
    {
        $this->options = [];
    }

    public function setOption(string $key, ?mixed $default = null, ?callable $validator = null): self
    {
        $this->options[$key] = $default;

        return $this;
    }

    public function setValidatorsFor(array $optionsKeys, callable $validator): self
    {
        return $this;
    }

    public function setDefaultOptionFor(string $optionKey, mixed $value): self
    {
        return $this;
    }
}
