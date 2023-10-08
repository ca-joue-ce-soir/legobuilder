<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine\Control\Option;

use Iterator;
use Legobuilder\Framework\Engine\Constraint\ConstraintInterface;

interface ControlOptionCollectionInterface extends Iterator
{
    /**
     * Adds a control option to the collection.
     *
     * @param ControlOptionInterface $controlOption The control option to add.
     * @return self Returns the current instance of the class.
     */
    public function add(ControlOptionInterface $controlOption): self;

    /**
     * Add a constraint to an existing control.
     *
     * @param string $id
     * @param ConstraintInterface $constraint
     */
    public function addConstraint(string $id, ConstraintInterface $constraint): self;

    /**
     * Resolves the given array of options.
     *
     * @param array $options The array of options to be resolved.
     * @return array The resolved array of options.
     */
    public function resolve(array $options): array;
}
