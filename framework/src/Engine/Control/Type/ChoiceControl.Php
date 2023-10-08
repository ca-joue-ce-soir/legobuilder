<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine\Control\Type;

use Legobuilder\Framework\Engine\Constraint\BooleanConstraint;
use Legobuilder\Framework\Engine\Control\AbstractControl;
use Legobuilder\Framework\Engine\Control\Option\ControlOption;
use Legobuilder\Framework\Engine\Control\Option\ControlOptionCollectionInterface;

class ChoiceControl extends AbstractControl
{
    /**
     * Get choice control type.
     *
     * @return string Control type.
     */
    public function getType(): string
    {
        return 'choice';
    }

    protected function configureOptions(): ControlOptionCollectionInterface
    {
        return (parent::configureOptions())
            ->add(
                (new ControlOption('multiple'))
                    ->setDefault(false)
                    ->setConstraints([
                        new BooleanConstraint()
                    ])
            )
        ;
    }

    /**
     * Retrieves the constraints.
     *
     * @return array The constraints.
     */
    public function getConstraints(): array
    {
        return [];
    }
}
