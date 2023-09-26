<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Zone\Factory;

use Exception;
use Legobuilder\Framework\Database\Repository\WidgetRepositoryInterface;
use Legobuilder\Framework\Widget\Factory\WidgetFactoryInterface;
use Legobuilder\Framework\Zone\Definition\Registry\ZoneDefinitionRegistryInterface;
use Legobuilder\Framework\Zone\Zone;
use Legobuilder\Framework\Zone\ZoneInterface;

class ZoneFactory implements ZoneFactoryInterface
{
    /**
     * @var ZoneDefinitionRegistryInterface
     */
    private $zoneDefinitionRegistry;

    /**
     * @var WidgetRepositoryInterface
     */
    private $widgetRepository;

    /**
     * @var WidgetFactoryInterface
     */
    private $widgetFactory;

    /**
     * ZoneFactory constructor.
     *
     * @param ZoneDefinitionRegistryInterface $zoneDefinitionRegistry
     * @param WidgetFactoryInterface          $widgetFactory
     */
    public function __construct(
        ZoneDefinitionRegistryInterface $zoneDefinitionRegistry,
        WidgetRepositoryInterface $widgetRepository,
        WidgetFactoryInterface $widgetFactory
    ) {
        $this->zoneDefinitionRegistry = $zoneDefinitionRegistry;
        $this->widgetRepository       = $widgetRepository;
        $this->widgetFactory = $widgetFactory;
    }

    /**
     * Get a zone by its identifier.
     *
     * @param  string $zoneIdentifier
     * @return Zone
     */
    public function getZone(string $zoneIdentifier): ?ZoneInterface
    {
        $zoneDefinition = $this->zoneDefinitionRegistry->getZoneDefinition($zoneIdentifier);

        if (null == $zoneDefinition) {
            return null;
        }

        $widgetsRevisions = $this->widgetRepository->findByZone($zoneIdentifier);
        $zone = new Zone($zoneDefinition);

        foreach ($widgetsRevisions as $widgetRevision) {
            $widget = $this->widgetFactory->getWidget($widgetRevision->getIdentifier());
            $zone->addWidget($widget);
        }

        return $zone;
    }
}
