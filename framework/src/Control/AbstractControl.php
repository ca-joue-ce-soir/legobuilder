<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Control;

use Legobuilder\Framework\Control\Option\ControlOptions;

/**
 * The AbstractControl class is an abstract implementation of the ControlInterface.
 * It provides a default implementation for the getOptions() method.
 */
abstract class AbstractControl implements ControlInterface
{
    /**
     * Retrieves the control options.
     *
     * @return ControlOptions The control options.
     */
    public function getOptions(): ControlOptions
    {
        return (new ControlOptions())
            ->addOption('label', true, null, 'is_string')
            ->addOption('hint', false, null, 'is_string');
    }
}
