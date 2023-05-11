<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Control\Base;

use Legobuilder\Framework\Control\AbstractControl;
use Legobuilder\Framework\Control\Option\ControlOptions;

class NumberControl extends AbstractControl
{
    public function getId(): string
    {   
        return 'number';
    }

    public function getOptions(): ControlOptions
    {
        return (parent::getOptions())
            ->setOption('min', null, 'is_int')
            ->setOption('max', null, 'is_int')
        ;
    }
}
