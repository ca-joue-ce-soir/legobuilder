<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Widget\Factory;

use Exception;
use Legobuilder\Framework\Widget\WidgetInterface;

final class WidgetFactory implements WidgetFactoryInterface
{
    /**
     * Create Widget with controls data.
     *
     * @return WidgetInterface
     */
    public function loadWidget(): WidgetInterface
    {
        throw new Exception('Not implemented yet.');
    }
}
