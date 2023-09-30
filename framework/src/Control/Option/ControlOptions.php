<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Control\Option;

use ArrayIterator;
use IteratorAggregate;
use Legobuilder\Framework\Control\Option\Exception\InvalidControlOptionException;
use Legobuilder\Framework\Control\Option\Exception\MissingControlOptionException;
use Legobuilder\Framework\Control\Option\Exception\UnknownControlOptionException;
use Traversable;

class ControlOptions implements Traversable, IteratorAggregate
{
    /**
     * @var ControlOptionInterface[]
     */
    private $options;

    public function __construct()
    {
        $this->options = [];
    }

    public function addOption(string $key, bool $required = false, $default = null, ?callable $validator = null): self
    {
        $this->options[$key] = (new ControlOption())
            ->setIdentifier($key)
            ->setDefault($default)
            ->setRequired($required)
            ->setValidator($validator);

        return $this;
    }

    public function setValidatorFor(string $optionKey, callable $validator): self
    {
        if (!isset($this->options[$optionKey])) {
            throw new UnknownControlOptionException($optionKey);
        }

        $option = $this->options[$optionKey];
        $option->setValidator($validator);

        return $this;
    }

    public function setDefaultFor(string $optionKey, mixed $default): self
    {
        if (!isset($this->options[$optionKey])) {
            throw new UnknownControlOptionException($optionKey);
        }

        $option = $this->options[$optionKey];
        $option->setDefault($default);

        return $this;
    }

    public function setRequiredFor(string $optionKey, bool $required): self
    {
        if (!isset($this->options[$optionKey])) {
            throw new UnknownControlOptionException($optionKey);
        }

        $option = $this->options[$optionKey];
        $option->setRequired($required);

        return $this;
    }

    public function getOption(string $optionKey): ControlOptionInterface
    {
        if (!isset($this->options[$optionKey])) {
            throw new UnknownControlOptionException($optionKey);
        }

        return $this->options[$optionKey];
    }

    public function validate(array $optionsToValidate): bool
    {
        foreach ($this->options as $optionKey => $option) {
            if ($option->isRequired() && (!isset($option[$optionKey]) || empty($option[$optionKey]))) {
                throw new MissingControlOptionException($optionKey);
            }

            if (empty($optionsToValidate[$optionKey])) {
                continue;
            }

            $isValid = call_user_func($option->getValidator(), $optionsToValidate[$optionKey]);

            if (true !== $isValid) {
                throw new InvalidControlOptionException($optionKey, $optionsToValidate[$optionKey]);
            }
        }

        return true;
    }

    /* Methods */
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->options);
    }
}
