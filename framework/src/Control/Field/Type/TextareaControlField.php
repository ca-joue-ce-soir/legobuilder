<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Control\Field\Type;

use Legobuilder\Framework\Control\Field\AbstractControlField;

class TextareaControlField extends AbstractControlField
{
    /**
     * Get textarea control type.
     *
     * @return string Control type.
     */
    public function getType(): string
    {
        return 'textarea';
    }

    /**
     * Retrieves the constraints.
     *
     * @return array The constraints.
     */
    public function getConstraints(): array
    {
        return [];
    }
}