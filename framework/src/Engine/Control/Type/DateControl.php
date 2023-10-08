<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine\Control\Type;

use Legobuilder\Framework\Engine\Constraint\DateConstraint;
use Legobuilder\Framework\Engine\Control\AbstractControl;
use Legobuilder\Framework\Engine\Control\Option\ControlOptionCollectionInterface;

class DateControl extends AbstractControl
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

    protected function configureOptions(): ControlOptionCollectionInterface
    {
        return (parent::configureOptions())
            ->addConstraint('default', new DateConstraint())
        ;
    }

    /**
     * Retrieves the constraints.
     *
     * @return array The array of constraints.
     */
    public function getConstraints(): array
    {
        return [
            new DateConstraint()
        ];
    }
}
