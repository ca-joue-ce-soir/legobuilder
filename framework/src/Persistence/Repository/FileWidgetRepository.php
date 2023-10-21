<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Persistence\Repository;

use Legobuilder\Framework\Persistence\Model\WidgetModel;

class FileWidgetRepository implements WidgetRepositoryInterface
{
    /**
     * Retrieves a widget by its ID.
     *
     * @param int $widgetId The ID of the widget to retrieve.
     * @return ?WidgetModel The retrieved widget as a WidgetModel object, or null if not found.
     */
    public function find(int $widgetId): ?WidgetModel
    {
        return null;
    }

    /**
     * Retrieves widgets by their zone.
     *
     * @param string $zone The zone of the widgets to retrieve.
     * @return WidgetModel[] An array of widgets objects that belong to the specified zone.
     */
    public function findByZone(string $zone): array
    {
        return [];
    }

    /**
     * Saves the widget data.
     *
     * @param WidgetModel $widget
     * @return bool Success ave
     */
    public function save(WidgetModel $widget): bool
    {
        return false;
    }
}
