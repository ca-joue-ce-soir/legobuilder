<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine\Control\Field\Type;

use Legobuilder\Framework\Engine\Constraint\BooleanConstraint;
use Legobuilder\Framework\Engine\Control\Field\AbstractControlField;
use Legobuilder\Framework\Engine\Control\Field\Option\ControlOption;
use Legobuilder\Framework\Engine\Control\Field\Option\ControlOptionCollectionInterface;
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
