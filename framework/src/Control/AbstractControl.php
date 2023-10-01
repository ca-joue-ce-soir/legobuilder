<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Control;

use Legobuilder\Framework\Control\Option\ControlOptionCollection;
use Legobuilder\Framework\Control\Option\ControlOptionCollectionInterface;

/**
 * The AbstractControl class is an abstract implementation of the ControlInterface.
 * It provides a default implementation for the getOptions() method.
 */
abstract class AbstractControl implements ControlInterface
{
    /**
     * Retrieves the control options.
     *
     * {@inheritdoc}
     */
    public function getOptions(): ControlOptionCollectionInterface
    {
        return (new ControlOptionCollection())
            ->add('label', true, null, 'is_string')
            ->add('hint', false, null, 'is_string');
    }
}
