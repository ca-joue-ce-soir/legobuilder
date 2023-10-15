<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine\Control\Field;

use Legobuilder\Framework\Engine\Control\Exception\OptionNotFoundException;
use Symfony\Component\OptionsResolver\OptionsResolver;

abstract class AbstractControlField implements ControlFieldInterface
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
    protected function configureOptions(OptionsResolver $optionsResolver): void
    {
        $optionsResolver
            ->setRequired([
                'label'
            ])
            ->setAllowedTypes('label', 'string')
            ->setAllowedTypes('hint', 'string')
            ->setAllowedTypes('required', 'bool')
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
        $optionsResolver = new OptionsResolver();
        $this->configureOptions($optionsResolver);

        $this->options = $optionsResolver->resolve($options);
    }

    /**
     * Retrieves the constraints for this object.
     *
     * @return array The collection of constraints.
     */
    public function sanitize(array $options): array
    {
        return [];
    }
}
