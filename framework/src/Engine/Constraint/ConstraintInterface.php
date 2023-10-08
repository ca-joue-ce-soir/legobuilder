<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine\Constraint;

interface ConstraintInterface
{
    /**
     * Validate a constraint.
     *
     * @param mixed $input
     * @return bool Is input value valid
     */
    public function validate($input): bool;
}
