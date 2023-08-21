<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Widget;

use Legobuilder\Framework\Endpoint\Type\WidgetDefinitionType;
use Legobuilder\Framework\Widget\Definition\WidgetDefinitionInterface;

final class Widget
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var Zone
     */
    private $zone;

    /**
     * @var $array
     */
    private $controlSettings;

    /**
     * @var WidgetDefinitionInterface
     */
    private $widgetDefinition;

    public function __construct(int $id, string $zone, array $controlSettings, WidgetDefinitionInterface $widgetDefinition)
    {
        $this->id = $id;
        $this->zone = $zone;
        $this->controlSettings = $controlSettings;
        $this->widgetDefinition = $widgetDefinition;
    }
}