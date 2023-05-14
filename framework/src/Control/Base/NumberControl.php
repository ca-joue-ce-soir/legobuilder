<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Control\Base;

use Legobuilder\Framework\Control\AbstractControl;
use Legobuilder\Framework\Control\Option\ControlOptions;

class NumberControl extends AbstractControl
{
    /**
     * Get number control ID.
     *
     * @return string Control type.
     */
    public function getId(): string
    {
        return 'number';
    }

    public function getOptions(): ControlOptions
    {
        return (parent::getOptions())
            ->addOption('min', true, null, 'is_int')
            ->addOption('max', true, null, 'is_int')
        ;
    }
}
