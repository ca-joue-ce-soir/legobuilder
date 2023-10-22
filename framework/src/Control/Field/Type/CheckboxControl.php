<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Control\Field\Type;

use Legobuilder\Framework\Constraint\BooleanConstraint;
use Legobuilder\Framework\Control\Field\AbstractControlField;

class ChoiceControl extends AbstractControlField
{
    /**
     * Get checkbox control type.
     *
     * @return string Control type.
     */
    public function getType(): string
    {
        return 'checkbox';
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
