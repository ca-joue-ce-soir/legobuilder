<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine\Control\Field\Type;

use Legobuilder\Framework\Engine\Constraint\NumberConstraint;
use Legobuilder\Framework\Engine\Control\Field\AbstractControlField;
use Legobuilder\Framework\Engine\Control\Field\Option\ControlOption;
use Legobuilder\Framework\Engine\Control\Field\Option\ControlOptionCollectionInterface;
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
