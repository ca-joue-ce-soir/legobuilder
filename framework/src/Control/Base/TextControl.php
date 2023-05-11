<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Control\Base;

use Legobuilder\Framework\Control\AbstractControl;
use Legobuilder\Framework\Control\Option\ControlOptions;

class TextControl extends AbstractControl
{
    public function getId(): string
    {   
        return 'text';
    }

    public function getOptions(): ControlOptions
    {
        return (parent::getOptions())
            ->setOption('default', null, 'is_text')
        ;
    }
}
