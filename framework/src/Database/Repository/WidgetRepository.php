<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Database\Repository;

use Legobuilder\Framework\Database\AbstractDatabaseAware;
use Legobuilder\Framework\Database\Model\WidgetModel;

class WidgetRepository extends AbstractDatabaseAware implements WidgetRepositoryInterface
{
    /**
     * Retrieves a widget by its ID.
     *
     * {@inheritdoc}
     */
    public function find(int $widgetId): WidgetModel
    {
        $widgetData = $this->connection->createQueryBuilder()
            ->from($this->databasePrefix . 'widget', 'w')
            ->select('w.id_widget, w.type, w.zone')
            ->where('w.id_widget = :id_widget')
            ->setParameter('id_widget', $widgetId)
            ->executeQuery()
            ->fetchOne()
        ;

        if (false === $widgetData) {
            return null;
        }

        return (new WidgetModel())
            ->setId($widgetData['id_widget'])
            ->setZone($widgetData['zone'])
            ->setType($widgetData['type'])
        ;
    }

    /**
     * Retrieves widgets by their zone.
     *
     * {@inheritdoc}
     */
    public function findByZone(string $zone): array
    {
        $widgetsData = $this->connection->createQueryBuilder()
            ->from($this->databasePrefix . 'widget', 'w')
            ->select('w.id_widget, w.type, w.zone')
            ->where('w.zone = :zone')
            ->setParameter('zone', $zone)
            ->executeQuery()
            ->fetchAllAssociative()
        ;
        
        $widgets = [];

        foreach ($widgetsData as $widgetData) {
            $widgets[] = (new WidgetModel())
                ->setId($widgetData['id_widget'])
                ->setZone($widgetData['zone'])
                ->setType($widgetData['type'])
            ;
        }

        return $widgets;
    }
}
