<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine\Control\Field\Type;

use Legobuilder\Framework\Engine\Control\Field\AbstractControlField;

class RadioControlField extends AbstractControlField
{
    /**
     * Get checkbox control type.
     *
     * @return string Control type.
     */
    public function getType(): string
    {
        return 'radio';
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
