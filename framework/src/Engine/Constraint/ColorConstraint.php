<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine\Constraint;

class ColorConstraint implements ConstraintInterface
{
    /**
     * Validate the input value.
     *
     * @param mixed $input The value to be validated.
     * @return bool Returns true if the input value matches an RGB/Hex color value.
     */
    public function validate($input): bool
    {
        return preg_match('/^#?([0-9A-F]{3}|[0-9A-F]{6})$/i', (string) $input) > 0;
    }
}
