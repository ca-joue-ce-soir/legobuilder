<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Control\Type;

use Legobuilder\Framework\Control\AbstractControl;
use Legobuilder\Framework\Control\Option\ControlOptionCollectionInterface;

class TextControl extends AbstractControl
{
    /**
     * Get text control type.
     *
     * @return string Control type.
     */
    public function getType(): string
    {
        return 'text';
    }

    public function getOptions(): ControlOptionCollectionInterface
    {
        return (parent::getOptions())
            ->add('default', false, null, 'is_string');
    }
}
