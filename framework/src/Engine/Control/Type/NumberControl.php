<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine\Control\Type;

use Legobuilder\Framework\Engine\Constraint\NumberConstraint;
use Legobuilder\Framework\Engine\Control\AbstractControl;
use Legobuilder\Framework\Engine\Control\Option\ControlOption;
use Legobuilder\Framework\Engine\Control\Option\ControlOptionCollectionInterface;

class NumberControl extends AbstractControl
{
    /**
     * Get number control type.
     *
     * @return string Control type.
     */
    public function getType(): string
    {
        return 'number';
    }

    /**
     * Retrieves the options for the control.
     *
     * @return ControlOptionCollectionInterface The collection of control options.
     */
    protected function configureOptions(): ControlOptionCollectionInterface
    {
        return (parent::configureOptions())
            ->add(
                (new ControlOption('min'))
                    ->setConstraints([
                        new NumberConstraint()
                    ])
            )
            ->add(
                (new ControlOption('max'))
                    ->setConstraints([
                        new NumberConstraint()
                    ])
            )
        ;
    }
}
