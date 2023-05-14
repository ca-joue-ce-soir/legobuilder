<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Control\Base;

use Legobuilder\Framework\Control\AbstractControl;
use Legobuilder\Framework\Control\Option\ControlOptions;

class TextControl extends AbstractControl
{
    /**
     * Get text control ID.
     *
     * @return string Control type.
     */
    public function getId(): string
    {
        return 'text';
    }

    public function getOptions(): ControlOptions
    {
        return (parent::getOptions())
            ->addOption('default', false, null, 'is_string')
        ;
    }
}
