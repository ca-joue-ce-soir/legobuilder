<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Control\Field\Type;

use Legobuilder\Framework\Constraint\NumberConstraint;
use Legobuilder\Framework\Control\Field\AbstractControlField;
use Legobuilder\Framework\Control\Field\Option\ControlOption;
use Legobuilder\Framework\Control\Field\Option\ControlOptionCollectionInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NumberControl extends AbstractControlField
{
    /**
     * Get number control type.
     *
     * @return string Control type.
     */
    public function getType(): string
    {
        return 'number';
    }

    /**
     * Retrieves the options for the control.
     */
    protected function configureOptions(OptionsResolver $optionsResolver): void
    {
        $optionsResolver
            ->setDefaults([
                'min' => 0,
                'max' => 1
            ])
            ->setAllowedTypes('min', 'int')
            ->setAllowedTypes('max', 'int')
        ;
    }
}
