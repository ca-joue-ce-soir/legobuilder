<?php

declare(strict_types=1);

namespace Legobuilder\Control;

use Legobuilder\Framework\Control\AbstractControl;

class ProductControl extends AbstractControl
{
    /**
     * Get product control type.
     *
     * @return string Control type.
     */
    public function getType(): string
    {
        return 'product';
    }
}
