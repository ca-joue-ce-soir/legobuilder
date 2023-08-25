<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Zone\Factory;

use Legobuilder\Framework\Widget\Factory\WidgetFactoryInterface;
use Legobuilder\Framework\Zone\Definition\Registry\ZoneDefinitionRegistryInterface;
use Legobuilder\Framework\Zone\Zone;

class ZoneFactory implements ZoneFactoryInterface
{
    /**
     * @var ZoneDefinitionRegistryInterface
     */
    private $zoneDefinitionRegistry;

    /**
     * @var WidgetFactoryInterface
     */
    private $widgetFactory;

    /**
     * ZoneFactory constructor.
     *
     * @param ZoneDefinitionRegistryInterface $zoneDefinitionRegistry
     * @param WidgetFactoryInterface $widgetFactory
     */
    public function __construct(
        ZoneDefinitionRegistryInterface $zoneDefinitionRegistry,
        WidgetFactoryInterface $widgetFactory
    ) {
        $this->zoneDefinitionRegistry = $zoneDefinitionRegistry;
        $this->widgetFactory = $widgetFactory;
    }

    /**
     * Get a zone by its identifier.
     *
     * @param string $zoneIdentifier
     * @return Zone
     */
    public function getZone(string $zoneIdentifier): Zone
    {
        $zoneDefinition = $this->zoneDefinitionRegistry->getZone($zoneIdentifier);
        $widgetsRevisions = $this->widgetRevisionRepository->findAllWidgetsRevisionsInZone($zoneIdentifier);

        $zone = new Zone($zoneDefinition);

        foreach ($widgetsRevisions as $widgetRevision) {
            $widget = $this->widgetFactory->getWidget($widgetRevision->getIdentifier());
            $zone->addWidget($widget);
        }

        return $zone;
    }
}