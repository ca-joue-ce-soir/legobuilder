<?php

declare(strict_types=1);

namespace Legobuilder\Framework;

use Legobuilder\Framework\Control\ControlCollectionInterface;
use Legobuilder\Framework\Endpoint\EndpointInterface;
use Legobuilder\Framework\Zone\ZoneInterface;
use Legobuilder\Framework\Renderer\RendererInterface;
use Legobuilder\Framework\Widget\Definition\Registry\WidgetDefinitionRegistryInterface;
use Legobuilder\Framework\Widget\Definition\WidgetDefinitionCollectionInterface;
use Legobuilder\Framework\Zone\ZoneCollectionInterface;

interface EngineInterface
{
    /**
     * Get the renderer.
     *
     * @return RendererInterface
     */
    public function getRenderer(): RendererInterface;

    /**
     * Get all zones available in the engine.
     *
     * @return array
     */
    public function getZones(): ZoneCollectionInterface;

    /**
     * Register a new zone for the engine.
     *
     * @param string $zoneIdentifier
     * @param ZoneInterface $zone
     * @return self
     */
    public function registerZone(string $zoneIdentifier, ZoneInterface $zone): self;

    /**
     * Get the Endpoint Manager.
     *
     * @return EndpointInterface
     */
    public function getEndpoint(): EndpointInterface;

    /**
     * Get Control Registry.
     * 
     * @return ControlCollectionInterface
     */
    public function getControlRegistry(): ControlCollectionInterface;

    /**
     * Get Widget Registry.
     * 
     * @return WidgetDefinitionCollectionInterface
     */
    public function getWidgetRegistry(): WidgetDefinitionCollectionInterface;
}
