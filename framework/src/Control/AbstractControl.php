<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Control;

use Legobuilder\Framework\Control\Option\ControlOptions;

abstract class AbstractControl implements ControlInterface
{
    public function getOptions(): ControlOptions
    {
        return (new ControlOptions())
            ->addOption('label', true, null, 'is_string')
            ->addOption('hint', false, null, 'is_string')
        ;
    }
}
