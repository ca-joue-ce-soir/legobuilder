<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine\Constraint;

class StringConstraint implements ConstraintInterface
{
    /**
     * Validates the input.
     *
     * @param mixed $input The input to be validated.
     * @return bool Returns true if the input is a string or an object with a "__toString" method.
     */
    public function validate($input): bool
    {
        return is_string($input) || (is_object($input) && method_exists($input, '__toString'));
    }
}
