<?php

declare(strict_types=1);

namespace Legobuilder\Framework;

use Legobuilder\Framework\Control\Registry\ControlRegistryInterface;
use Legobuilder\Framework\Database\Migration\MigrationExecutor;
use Legobuilder\Framework\Endpoint\EndpointInterface;
use Legobuilder\Framework\Renderer\RendererInterface;
use Legobuilder\Framework\Widget\Definition\Registry\WidgetDefinitionRegistryInterface;
use Legobuilder\Framework\Zone\Registry\ZoneRegistryInterface;

interface EngineInterface
{
    /**
     * Get the Migration Executor.
     * 
     * @return MigrationExecutor
     */
    public function getMigrationExecutor(): MigrationExecutor;

    /**
     * Get the renderer.
     *
     * @return RendererInterface
     */
    public function getRenderer(): RendererInterface;

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
     * Get Widget Registry.
     * 
     * @return WidgetDefinitionRegistryInterface
     */
    public function getWidgetDefinitionRegistry(): WidgetDefinitionRegistryInterface;

    /**
     * Get Zone Registry.
     * 
     * @return ZoneRegistryInterface
     */
    public function getZoneRegistry(): ZoneRegistryInterface;
}
