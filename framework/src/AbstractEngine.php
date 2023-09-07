<?php

declare(strict_types=1);

namespace Legobuilder\Framework;

use Legobuilder\Framework\Control\Base\ColorControl;
use Legobuilder\Framework\Control\Base\NumberControl;
use Legobuilder\Framework\Control\Base\TextControl;
use Legobuilder\Framework\Control\Registry\ControlRegistry;
use Legobuilder\Framework\Control\Registry\ControlRegistryInterface;
use Legobuilder\Framework\Database\Bridge\DatabaseBridgeInterface;
use Legobuilder\Framework\Database\Repository\WidgetModelRepository;
use Legobuilder\Framework\Endpoint\EndpointInterface;
use Legobuilder\Framework\Endpoint\EngineEndpoint;
use Legobuilder\Framework\Renderer\RendererInterface;
use Legobuilder\Framework\Widget\Definition\Registry\WidgetDefinitionRegistry;
use Legobuilder\Framework\Widget\Definition\Registry\WidgetDefinitionRegistryInterface;
use Legobuilder\Framework\Zone\Definition\Registry\ZoneDefinitionRegistry;
use Legobuilder\Framework\Zone\Definition\Registry\ZoneDefinitionRegistryInterface;

/**
 * The `AbstractEngine` class is an abstract class that implements the `EngineInterface`.
 * It provides the basic structure and functionality for an engine in a Lego builder framework.
 */
abstract class AbstractEngine implements EngineInterface
{
    /**
     * @var RendererInterface The renderer used by the engine.
     */
    protected $renderer;

    /**
     * @var EndpointInterface The endpoint of the engine.
     */
    protected $endpoint;

    /**
     * @var ControlRegistryInterface The control registry used by the engine.
     */
    protected $controlRegistry;

    /**
     * @var ZoneDefinitionRegistryInterface The zone definition registry used by the engine.
     */
    protected $zoneDefinitionRegistry;

    /**
     * @var WidgetDefinitionRegistryInterface The widget definition registry used by the engine.
     */
    protected $widgetDefinitionRegistry;

    /**
     * @var WidgetModelRepository The widget model repository used by the engine.
     */
    protected $widgetModelRepository;

    /**
     * Initializes the engine with a renderer and a database bridge.
     * It also initializes the control registry, zone definition registry, and widget definition registry.
     * It registers the default controls and platform-specific controls, widget definitions, and zones.
     * Finally, it creates the engine endpoint.
     *
     * @param RendererInterface $renderer The renderer to be used by the engine.
     * @param DatabaseBridgeInterface $databaseBridge The database bridge to be used by the engine.
     */
    public function __construct(RendererInterface $renderer, DatabaseBridgeInterface $databaseBridge)
    {
        $this->renderer = $renderer;
        $this->controlRegistry = new ControlRegistry();
        $this->zoneDefinitionRegistry = new ZoneDefinitionRegistry();
        $this->widgetDefinitionRegistry = new WidgetDefinitionRegistry();

        $this->registerDefaultControls();
        $this->registerPlatformControls();
        $this->registerPlatformWidgetsDefinitions();
        $this->registerPlatformZones();

        $this->endpoint = new EngineEndpoint($this);
    }

    /**
     * Returns the zone definition registry.
     *
     * @return ZoneDefinitionRegistryInterface The zone definition registry.
     */
    public function getZoneDefinitionRegistry(): ZoneDefinitionRegistryInterface
    {
        return $this->zoneDefinitionRegistry;
    }

    /**
     * Returns the control registry.
     *
     * @return ControlRegistryInterface The control registry.
     */
    public function getControlRegistry(): ControlRegistryInterface
    {
        return $this->controlRegistry;
    }

    /**
     * Returns the engine endpoint.
     *
     * @return EndpointInterface The engine endpoint.
     */
    public function getEndpoint(): EndpointInterface
    {
        return $this->endpoint;
    }

    /**
     * Registers the default controls.
     */
    protected function registerDefaultControls(): void
    {
        $this->controlRegistry
            ->registerControl(new TextControl())
            ->registerControl(new NumberControl())
            ->registerControl(new ColorControl());
    }
}
