<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Control\Base;

use Legobuilder\Framework\Control\AbstractControl;
use Legobuilder\Framework\Control\Option\ControlOptions;

class ColorControl extends AbstractControl
{
    public function __construct(callable $translator)
    {   
        $this->id = 'color';
        $this->name = call_user_func($translator, 'Color');        
    }
    
    public function getOptions(): ControlOptions
    {
        return (parent::getOptions())
            ->setOption('color', null, 'is_text')
        ;
    }
}
