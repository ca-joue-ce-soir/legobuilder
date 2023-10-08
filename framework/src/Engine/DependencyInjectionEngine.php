<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine;

use Legobuilder\Framework\Endpoint\EndpointInterface;
use Legobuilder\Framework\Persistence\Repository\WidgetRepositoryInterface;
use Legobuilder\Framework\Engine\Widget\Definition\Registry\WidgetDefinitionRegistryInterface;
use Legobuilder\Framework\Engine\Zone\Factory\ZoneFactoryInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

abstract class DependencyInjectionEngine implements EngineInterface
{
    /**
     * @var ContainerBuilder Container used for the engine.
     */
    protected $container;

    /**
     * Initializes the engine.
     */
    public function __construct(WidgetRepositoryInterface $widgetRepository)
    {
        $this->container = $this->createContainer($widgetRepository);
        $this->registerPlatformWidgetsDefinitions();
    }

    /**
     * Create the container with various registry and factory services.
     *
     * @todo Using the config cache to improves performance.
     *
     * @param WidgetRepositoryInterface $widgetRepository
     */
    private function createContainer(WidgetRepositoryInterface $widgetRepository)
    {
        $container = new ContainerBuilder();

        $container->set('repository.widget_repository', $widgetRepository);
        $container->setAlias(WidgetRepositoryInterface::class, 'repository.widget_repository');

        $configurationLoader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../Ressources/config'));
        $configurationLoader->load('services.yml');

        $container->compile();

        return $container;
    }

    /**
     * Returns the widget definition registry.
     *
     * @return WidgetDefinitionRegistryInterface The widget definition registry.
     */
    public function getWidgetDefinitionRegistry(): WidgetDefinitionRegistryInterface
    {
        return $this->container->get(WidgetDefinitionRegistryInterface::class);
    }

    /**
     * Get the endpoint.
     *
     * @return EndpointInterface The engine endpoint.
     */
    public function getEndpoint(): EndpointInterface
    {
        return $this->container->get(EndpointInterface::class);
    }

    /**
     * Get the zone factory.
     *
     * @return ZoneFactoryInterface
     */
    public function getZoneFactory(): ZoneFactoryInterface
    {
        return $this->container->get(ZoneFactoryInterface::class);
    }
}
