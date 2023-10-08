<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine\Constraint;

class NumberConstraint implements ConstraintInterface
{
    /**
     * Validates the input to check if it is a numeric value.
     *
     * @param mixed $input The value to be validated.
     * @return bool Returns true if the input is a numeric value, false otherwise.
     */
    public function validate($input): bool
    {
        if (false === is_numeric($input)) {
            return false;
        }

        return !is_nan((float) $input);
    }
}
