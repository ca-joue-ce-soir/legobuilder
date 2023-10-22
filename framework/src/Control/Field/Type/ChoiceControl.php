<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Control\Field\Type;

use Legobuilder\Framework\Constraint\BooleanConstraint;
use Legobuilder\Framework\Control\Field\AbstractControlField;
use Legobuilder\Framework\Control\Field\Option\ControlOption;
use Legobuilder\Framework\Control\Field\Option\ControlOptionCollectionInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChoiceControl extends AbstractControlField
{
    /**
     * Get choice control type.
     *
     * @return string Control type.
     */
    public function getType(): string
    {
        return 'choice';
    }

    /**
     * Configure the options for the control.
     */
    protected function configureOptions(OptionsResolver $optionsResolver): void
    {
        $optionsResolver
            ->setDefaults([])
        ;
    }

    /**
     * Retrieves the constraints.
     *
     * @return array The constraints.
     */
    public function getConstraints(): array
    {
        return [];
    }
}
