<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine\Control\Type;

use Legobuilder\Framework\Engine\Constraint\BooleanConstraint;
use Legobuilder\Framework\Engine\Control\AbstractControl;

class ChoiceControl extends AbstractControl
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
        return [
            new BooleanConstraint()
        ];
    }
}
