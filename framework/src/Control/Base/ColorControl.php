<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Control\Base;

use Legobuilder\Framework\Control\AbstractControl;
use Legobuilder\Framework\Control\Option\ControlOptions;

class ColorControl extends AbstractControl
{
    /**
     * Get color control ID.
     *
     * @return string Control type.
     */
    public function getId(): string
    {
        return 'color';
    }

    public function getOptions(): ControlOptions
    {
        return (parent::getOptions())
            ->addOption('color', true, null, 'is_string')
        ;
    }
}
