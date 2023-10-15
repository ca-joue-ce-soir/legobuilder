<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine\Control\Field\Type;

use Legobuilder\Framework\Engine\Constraint\StringConstraint;
use Legobuilder\Framework\Engine\Control\Field\AbstractControlField;

class TextControl extends AbstractControlField
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
