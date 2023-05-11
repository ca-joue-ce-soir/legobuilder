<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Control\Base;

use Legobuilder\Framework\Control\AbstractControl;
use Legobuilder\Framework\Control\Option\ControlOptions;

class ColorControl extends AbstractControl
{
    public function getId(): string
    {   
        return 'color';
    }
    
    public function getOptions(): ControlOptions
    {
        return (parent::getOptions())
            ->setOption('color', null, 'is_text')
        ;
    }
}
