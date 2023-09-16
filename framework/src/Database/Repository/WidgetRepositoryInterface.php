<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Database\Repository;

use Legobuilder\Framework\Database\Model\WidgetModel;

interface WidgetRepositoryInterface
{
    /**
     * Retrieves a widget by its ID.
     *
     * @param int $widgetId The ID of the widget to retrieve.
     * @return WidgetModel|null The retrieved widget as a WidgetModel object, or null if not found.
     */
    public function find(int $widgetId): WidgetModel;
    
    /**
     * Retrieves widgets by their zone.
     *
     * @param string $zone The zone of the widgets to retrieve.
     * @return WidgetModel[] An array of widgets objects that belong to the specified zone.
     */
    public function findByZone(string $zone): array;
}
