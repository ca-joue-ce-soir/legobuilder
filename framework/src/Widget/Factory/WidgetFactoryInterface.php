<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Widget\Factory;

use Legobuilder\Framework\Database\Model\WidgetModel;
use Legobuilder\Framework\Widget\WidgetInterface;

interface WidgetFactoryInterface
{
    /**
     * Create Widget with controls data.
     *
     * @param WidgetModel $widgetModel
     * @param bool        $useCache
     * 
     * @return WidgetInterface
     */
    public function getWidget(WidgetModel $widgetModel, bool $useCache = false): WidgetInterface;
}
