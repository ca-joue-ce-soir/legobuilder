<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine;

use Legobuilder\Framework\Endpoint\EndpointInterface;
use Legobuilder\Framework\Engine\Widget\Definition\Registry\WidgetDefinitionRegistryInterface;
use Legobuilder\Framework\Engine\Zone\Factory\ZoneFactoryInterface;

interface EngineInterface
{
    /**
     * Handles the register of all the Widgets Definitions for the platform.
     */
    public function registerPlatformWidgetsDefinitions(): void;

    /**
     * Get the Endpoint Manager.
     *
     * @return EndpointInterface
     */
    public function getEndpoint(): EndpointInterface;

    /**
     * Get Widget Definition Registry.
     *
     * @return WidgetDefinitionRegistryInterface
     */
    public function getWidgetDefinitionRegistry(): WidgetDefinitionRegistryInterface;

    /**
     * Get Zone Factory.
     *
     * @return ZoneFactoryInterface
     */
    public function getZoneFactory(): ZoneFactoryInterface;
}
