<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Control\Type;

use Legobuilder\Framework\Control\AbstractControl;
use Legobuilder\Framework\Control\Option\ControlOptionCollectionInterface;

class ColorControl extends AbstractControl
{
    /**
     * Get color control type.
     *
     * @return string Control type.
     */
    public function getType(): string
    {
        return 'color';
    }

    public function getOptions(): ControlOptionCollectionInterface
    {
        return (parent::getOptions())
            ->add('color', true, null, 'is_string');
    }
}
