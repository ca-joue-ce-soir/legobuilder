<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Control\Type;

use Legobuilder\Framework\Control\AbstractControl;
use Legobuilder\Framework\Control\Option\ControlOptionCollectionInterface;

class NumberControl extends AbstractControl
{
    /**
     * Get number control type.
     *
     * @return string Control type.
     */
    public function getType(): string
    {
        return 'number';
    }

    public function getOptions(): ControlOptionCollectionInterface
    {
        return (parent::getOptions())
            ->add('min', true, null, 'is_int')
            ->add('max', true, null, 'is_int');
    }
}
