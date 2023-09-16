<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint;

use Legobuilder\Framework\Endpoint\Loader\TypeLoader;
use Legobuilder\Framework\Endpoint\Loader\TypeLoaderInterface;
use Legobuilder\Framework\Endpoint\Resolver\ControlResolver;
use Legobuilder\Framework\Endpoint\Resolver\WidgetResolver;
use Legobuilder\Framework\Endpoint\Resolver\ZoneResolver;
use Legobuilder\Framework\Endpoint\Type\QueryType;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;

use function Symfony\Component\DependencyInjection\Loader\Configurator\tagged_iterator;

class EndpointExtension extends Extension
{
    /**
     * Loads the extension.
     *
     * This method configures the container by autowiring the control resolver, zone resolver, and widget resolver services.
     * It also registers an endpoint service.
     *
     * @param array $configs The array of configurations.
     * @param ContainerBuilder $container The container builder.
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $container->autowire('endpoint.resolver.control_resolver', ControlResolver::class);
        $container->autowire('endpoint.resolver.zone_resolver', ZoneResolver::class);
        $container->autowire('endpoint.resolver.widget_resolver', WidgetResolver::class);

        $container->registerForAutoconfiguration(QueryType::class)
            ->addTag('endpoint.type')
            ->setAutowired(true)
        ;

        $container->register('endpoint.type_loader', TypeLoader::class)
            ->addArgument([tagged_iterator('endpoint.type')]);
        $container->setAlias(TypeLoaderInterface::class, 'endpoint.type_loader');

        $container->register('endpoint', Endpoint::class)->setPublic(true);
        $container->registerAliasForArgument(Endpo)
    }
}
