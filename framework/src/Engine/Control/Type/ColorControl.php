<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine\Control\Type;

use Legobuilder\Framework\Engine\Constraint\ColorConstraint;
use Legobuilder\Framework\Engine\Control\AbstractControl;

class ColorControl extends AbstractControl
{
    /**
     * Get color control type.
     *
     * @return string Control type.
     */
    public function getType(): string
    {
        return 'color';
    }

    /**
     * Get the constraints.
     *
     * @return array The array of constraints.
     */
    public function getConstraints(): array
    {
        return [
            new ColorConstraint()
        ];
    }
}
