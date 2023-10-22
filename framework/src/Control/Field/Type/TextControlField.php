<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Control\Field\Type;

use Legobuilder\Framework\Control\Field\AbstractControlField;

class TextControlField extends AbstractControlField
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
