<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Control\Base;

use Legobuilder\Framework\Control\AbstractControl;
use Legobuilder\Framework\Control\Option\ControlOptions;

class TextControl extends AbstractControl
{
    public function __construct(callable $translator)
    {   
        $this->id = 'text';
        $this->name = call_user_func($translator, 'Text');        
    }

    public function getOptions(): ControlOptions
    {
        return (parent::getOptions())
            ->setOption('default', null, 'is_text')
        ;
    }
}
