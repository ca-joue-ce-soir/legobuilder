<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Widget\Registry;

use Legobuilder\Framework\Widget\Definition\WidgetDefinitionCollection;
use Legobuilder\Framework\Widget\Definition\WidgetDefinitionCollectionInterface;

final class WidgetRegistry implements WidgetRegistryInterface
{
    /**
     * @var WidgetDefinitionCollectionInterface
     */
    private $registeredDefinitions;

    public function __construct()
    {
        $this->registeredDefinitions = new WidgetDefinitionCollection();
    }

    /**
     * Get Widgets registered.
     *
     * @return WidgetDefinitionCollectionInterface
     */
    public function getRegisteredWidgets(): WidgetDefinitionCollectionInterface
    {
        return $this->registeredDefinitions;
    }
}
