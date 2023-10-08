<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine\Control\Type;

use Legobuilder\Framework\Engine\Constraint\BooleanConstraint;
use Legobuilder\Framework\Engine\Control\AbstractControl;

class RadioControl extends AbstractControl
{
    /**
     * Get checkbox control type.
     *
     * @return string Control type.
     */
    public function getType(): string
    {
        return 'radio';
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
