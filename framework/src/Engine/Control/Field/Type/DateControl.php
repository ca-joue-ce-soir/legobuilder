<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine\Control\Field\Type;

use Legobuilder\Framework\Engine\Constraint\DateConstraint;
use Legobuilder\Framework\Engine\Control\Field\AbstractControlField;
use Legobuilder\Framework\Engine\Control\Field\Option\ControlOptionCollectionInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DateControl extends AbstractControlField
{
    /**
     * Get color control type.
     *
     * @return string Control type.
     */
    public function getType(): string
    {
        return 'date';
    }

    protected function configureOptions(OptionsResolver $optionsResolver): void
    {
        $optionsResolver
            ->setAllowedTypes('default', 'date')
        ;
    }

    /**
     * Retrieves the constraints.
     *
     * @return array The array of constraints.
     */
    public function getConstraints(): array
    {
        return [];
    }
}
