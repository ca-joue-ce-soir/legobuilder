<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine\Constraint;

class BooleanConstraint implements ConstraintInterface
{
    /**
     * Validates the given input value as a boolean.
     *
     * @param mixed $input The input value to be validated.
     * @return bool Returns true if the input value is a boolean, false otherwise.
     */
    public function validate($input): bool
    {
        return is_bool(filter_var($input, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE));
    }
}
