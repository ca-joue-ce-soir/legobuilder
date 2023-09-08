<?php

declare(strict_types=1);

namespace Legobuilder\Framework;

use Legobuilder\Framework\Control\Registry\ControlRegistryInterface;
use Legobuilder\Framework\Endpoint\EndpointInterface;
use Legobuilder\Framework\Widget\Definition\Registry\WidgetDefinitionRegistryInterface;
use Legobuilder\Framework\Zone\Definition\Registry\ZoneDefinitionRegistryInterface;

interface EngineInterface
{
    /**
     * Handles the register of all the Controls for the platform, methods
     * differ for PrestaShop or Wordpress for example.
     */
    public function registerPlatformControls(): void;

    /**
     * Handles the register of all the Widgets Definitions for the platform.
     */
    public function registerPlatformWidgetsDefinitions(): void;

    /**
     * Handles the register of all the Zones for the platform.
     */
    public function registerPlatformZones(): void;

    /**
     * Get the Endpoint Manager.
     *
     * @return EndpointInterface
     */
    public function getEndpoint(): EndpointInterface;

    /**
     * Get Control Registry.
     *
     * @return ControlRegistryInterface
     */
    public function getControlRegistry(): ControlRegistryInterface;

    /**
     * Get Zone Definition Registry.
     *
     * @return ZoneDefinitionRegistryInterface
     */
    public function getZoneDefinitionRegistry(): ZoneDefinitionRegistryInterface;

    /**
     * Get Widget Definition Registry.
     *
     * @return WidgetDefinitionRegistryInterface
     */
    public function getWidgetDefinitionRegistry(): WidgetDefinitionRegistryInterface;
}
