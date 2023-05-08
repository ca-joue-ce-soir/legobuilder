<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Widget\Factory;

use Legobuilder\Framework\Widget\WidgetInterface;

interface WidgetFactoryInterface
{
    /**
     * Create Widget with controls data.
     *
     * @return WidgetInterface
     */
    public function loadWidget(): WidgetInterface;
}
