<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine\Zone\Factory;

use Legobuilder\Framework\Persistence\Repository\WidgetRepositoryInterface;
use Legobuilder\Framework\Engine\Widget\Factory\WidgetFactoryInterface;
use Legobuilder\Framework\Engine\Zone\Zone;
use Legobuilder\Framework\Engine\Zone\ZoneInterface;

class ZoneFactory implements ZoneFactoryInterface
{
    /**
     * @var WidgetRepositoryInterface
     */
    private $widgetRepository;

    /**
     * @var WidgetFactoryInterface
     */
    private $widgetFactory;

    public function __construct(
        WidgetRepositoryInterface $widgetRepository,
        WidgetFactoryInterface $widgetFactory
    ) {
        $this->widgetRepository = $widgetRepository;
        $this->widgetFactory = $widgetFactory;
    }

    /**
     * Get a zone by its identifier.
     *
     * @param string $zoneIdentifier
     * @return Zone
     */
    public function getZone(string $zoneIdentifier): ?ZoneInterface
    {
        $zone = new Zone($zoneIdentifier);
        $widgetsData = $this->widgetRepository->findByZone($zoneIdentifier);

        foreach ($widgetsData as $widgetData) {
            $widget = $this->widgetFactory->getWidget($widgetData);
            $zone->addWidget($widget);
        }

        return $zone;
    }
}
