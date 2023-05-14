<?php

declare(strict_types=1);

namespace Legobuilder\Framework;

use Legobuilder\Framework\Control\Base\ColorControl;
use Legobuilder\Framework\Control\Base\NumberControl;
use Legobuilder\Framework\Control\Base\TextControl;
use Legobuilder\Framework\Control\Registry\ControlRegistryInterface;
use Legobuilder\Framework\Endpoint\EndpointInterface;
use Legobuilder\Framework\Zone\ZoneInterface;
use Legobuilder\Framework\Renderer\DefaultRenderer;
use Legobuilder\Framework\Renderer\RendererInterface;
use Legobuilder\Framework\Widget\Definition\Registry\WidgetDefinitionRegistryInterface;
use Legobuilder\Framework\Zone\ZoneCollectionInterface;

abstract class AbstractEngine implements EngineInterface
{
    /**
     * @var ZoneCollectionInterface
     */
    protected $zones;

    /**
     * @var RendererInterface
     */
    protected $renderer;

    /**
     * @var EndpointInterface
     */
    protected $endpoint;

    /**
     * @var ControlRegistryInterface
     */
    protected $controlRegistry;

    /**
     * @var WidgetDefinitionRegistryInterface
     */
    protected $widgetDefinitionRegistry;

    public function __construct(
        ControlRegistryInterface $controlRegistry, 
        WidgetDefinitionRegistryInterface $widgetDefinitionRegistry)
    {
        $this->renderer = new DefaultRenderer();
        $this->controlRegistry = $controlRegistry;
        $this->widgetDefinitionRegistry = $widgetDefinitionRegistry;

        $controlRegistry
            ->registerControl(new TextControl())
            ->registerControl(new NumberControl())
            ->registerControl(new ColorControl())
        ;
    }

    public function registerZone(string $zoneIdentifier, ZoneInterface $zone): self
    {
        $this->zones->add($zoneIdentifier, get_class($zone));

        return $this;
    }

    public function getZones(): ZoneCollectionInterface
    {
        return $this->zones;
    }

    public function getRenderer(): RendererInterface
    {
        return $this->renderer;
    }
}
