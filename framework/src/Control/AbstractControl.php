<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Control;

use Legobuilder\Framework\Control\Option\ControlOptions;

abstract class AbstractControl implements ControlInterface
{
    public function getOptions(): ControlOptions
    {
        return (new ControlOptions())
            ->setOption('label', null, 'is_text')
            ->setOption('hint', null, 'is_text')
        ;
    }
}
