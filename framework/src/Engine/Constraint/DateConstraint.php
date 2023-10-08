<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine\Constraint;

class DateConstraint implements ConstraintInterface
{
    /**
     * Validates the given input.
     *
     * @param mixed $input The value to be validated.
     * @return bool Returns true if the input is a valid date and time string, false otherwise.
     */
    public function validate($input): bool
    {
        return strtotime($input) !== false;
    }
}
