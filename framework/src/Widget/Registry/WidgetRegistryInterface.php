<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Widget\Registry;

use Legobuilder\Framework\Widget\Definition\WidgetDefinitionCollectionInterface;

interface WidgetRegistryInterface
{
    /**
     * Get Widgets registered.
     *
     * @return WidgetDefinitionCollectionInterface
     */
    public function getRegisteredWidgets(): WidgetDefinitionCollectionInterface;
}
