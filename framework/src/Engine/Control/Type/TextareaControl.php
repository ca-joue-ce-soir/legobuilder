<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine\Control\Type;

use Legobuilder\Framework\Engine\Constraint\StringConstraint;
use Legobuilder\Framework\Engine\Control\AbstractControl;

class TextareaControl extends AbstractControl
{
    /**
     * Get textarea control type.
     *
     * @return string Control type.
     */
    public function getType(): string
    {
        return 'textarea';
    }

    /**
     * Retrieves the constraints.
     *
     * @return array The constraints.
     */
    public function getConstraints(): array
    {
        return [
            new StringConstraint()
        ];
    }
}
