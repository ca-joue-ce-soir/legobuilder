<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine\Widget\Factory;

use Legobuilder\Framework\Persistence\Model\WidgetModel;
use Legobuilder\Framework\Engine\Widget\WidgetInterface;

interface WidgetFactoryInterface
{
    /**
     * Create Widget with controls data.
     *
     * @param WidgetModel $widgetModel
     * @param bool $useCache
     *
     * @return ?WidgetInterface
     */
    public function getWidget(WidgetModel $widgetModel, bool $useCache = false): ?WidgetInterface;

    /**
     * Create Widget with controls data from the identifier.
     *
     * @param int $id
     * @param bool $useCache
     *
     * @return ?WidgetInterface
     */
    public function getWidgetById(int $id, bool $useCache = false):? WidgetInterface;
}
