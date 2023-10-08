<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine\Control;

use Legobuilder\Framework\Engine\Constraint\BooleanConstraint;
use Legobuilder\Framework\Engine\Constraint\StringConstraint;
use Legobuilder\Framework\Engine\Control\Exception\OptionNotFoundException;
use Legobuilder\Framework\Engine\Control\Option\ControlOption;
use Legobuilder\Framework\Engine\Control\Option\ControlOptionCollection;
use Legobuilder\Framework\Engine\Control\Option\ControlOptionCollectionInterface;

abstract class AbstractControl implements ControlInterface
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var array
     */
    private $options = null;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    /**
     * Get the value of id
     *
     * @return  string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function setOptions(array $options): self
    {
        $this->resolveOptions($options);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getOptions()
    {
        if (null === $this->options) {
            $this->resolveOptions();
        }

        return $this->options;
    }

    /**
     * {@inheritdoc}
     */
    public function getOption(string $name)
    {
        if (!array_key_exists($name, $this->options)) {
            throw new OptionNotFoundException($name, static::class);
        }

        return $this->options[$name];
    }

    /**
     * Retrieves the control options.
     *
     * {@inheritdoc}
     */
    protected function configureOptions(): ControlOptionCollectionInterface
    {
        return (new ControlOptionCollection())
            ->add(
                (new ControlOption('label'))
                    ->setRequired(true)
                    ->setConstraints([
                        new StringConstraint()
                    ])
            )
            ->add(
                (new ControlOption('hint'))
                    ->setConstraints([
                        new StringConstraint()
                    ])
            )
            ->add(
                (new ControlOption('required'))
                    ->setDefault(false)
                    ->setConstraints([
                        new BooleanConstraint()
                    ])
            )
            ->add(
                (new ControlOption('default'))
            )
        ;
    }

    /**
     * Resolve control options based on the configuration and
     * the provided options.
     *
     * @param array $options
     */
    private function resolveOptions(array $options = [])
    {
        $controlOptionCollection = $this->configureOptions();
        $this->options = $controlOptionCollection->resolve($options);
    }

    /**
     * Retrieves the constraints for this object.
     *
     * @return array The collection of constraints.
     */
    public function getConstraints(): array
    {
        return [];
    }
}
