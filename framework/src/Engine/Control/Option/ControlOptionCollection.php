<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine\Control\Option;

use Legobuilder\Framework\Collection\AbstractCollection;
use Legobuilder\Framework\Engine\Constraint\ConstraintInterface;
use Legobuilder\Framework\Engine\Control\Option\Exception\InvalidControlOptionException;
use Legobuilder\Framework\Engine\Control\Option\Exception\MissingControlOptionException;
use Legobuilder\Framework\Engine\Control\Option\Exception\NotFoundControlOptionException;

/**
 * @property ControlOptionInterface[] $items
 */
class ControlOptionCollection extends AbstractCollection implements ControlOptionCollectionInterface
{
    /**
     * Adds a control option to the collection.
     *
     * {@inheritdoc}
     */
    public function add(ControlOptionInterface $controlOption): self
    {
        $this->items[$controlOption->getIdentifier()] = $controlOption;

        return $this;
    }

    /**
     * Adds a constraint to the control option from the collection.
     *
     * @param string $id The ID of the control option.
     * @param ConstraintInterface $constraint The constraint to be added.
     * @throws NotFoundControlOptionException If the control option with the given ID is not found.
     * @return ControlOptionCollectionInterface The updated control option collection.
     */
    public function addConstraint(string $id, ConstraintInterface $constraint): ControlOptionCollectionInterface
    {
        if (!isset($this->items[$id])) {
            throw new NotFoundControlOptionException($id);
        }

        $control = $this->items[$id];

        $constraints = $control->getConstraints();
        $constraints[] = $constraint;

        $control->setConstraints($constraints);

        return $this;
    }

    /**
     * Resolves the given array of options.
     *
     * {@inheritdoc}
     */
    public function resolve(array $options): array
    {
        foreach ($this->items as $controlOption) {
            $controlOptionIdentifier = $controlOption->getIdentifier();

            if (!isset($options[$controlOptionIdentifier])) {
                if ($controlOption->isRequired()) {
                    throw new MissingControlOptionException($controlOptionIdentifier);
                }

                if (null !== $controlOption->getDefault()) {
                    $options[$controlOptionIdentifier] = $controlOption->getDefault();
                }

                continue;
            }

            $optionInput = $options[$controlOptionIdentifier];

            foreach ($controlOption->getConstraints() as $constraint) {
                if (false === $constraint->validate($optionInput)) {
                    throw new InvalidControlOptionException($controlOptionIdentifier);
                }
            }
        }

        return $options;
    }
}
