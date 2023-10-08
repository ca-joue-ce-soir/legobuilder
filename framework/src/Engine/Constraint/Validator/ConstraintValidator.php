<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine\Constraint\Validator;

use Legobuilder\Framework\Engine\Constraint\ConstraintInterface;

class ConstraintValidator implements ConstraintValidatorInterface
{
    /**
     * Validates the given input through multiples constraints
     *
     * @param mixed $input The input value to be validated.
     * @param ConstraintInterface[] $constraints The list of constraints.
     * @return bool Returns true if the input value is valid, false otherwise.
     */
    public function validate($input, array $constraints): bool
    {
        foreach ($constraints as $constraint) {
            if (false === $constraint->validate($input)) {
                return false;
            }
        }

        return true;
    }
}
