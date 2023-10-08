<?php

declare(strict_types=1);

namespace Legobuilder\Database\Repository;

use Legobuilder\Database\AbstractDatabaseAware;
use Legobuilder\Framework\Persistence\Model\WidgetModel;
use Legobuilder\Framework\Persistence\Repository\WidgetRepositoryInterface;

class WidgetRepository extends AbstractDatabaseAware implements WidgetRepositoryInterface
{
    public function find(int $widgetId): ?WidgetModel
    {
        $widgetData = $this->connection->createQueryBuilder()
            ->from($this->databasePrefix . 'widget', 'w')
            ->select('w.id_widget, w.type, w.zone')
            ->where('w.id_widget = :id_widget')
            ->setParameter('id_widget', $widgetId)
            ->execute()
            ->fetch()
        ;

        if (false === $widgetData) {
            return null;
        }

        return (new WidgetModel())
            ->setId($widgetData['id_widget'])
            ->setZoneId($widgetData['zone'])
            ->setType($widgetData['type'])
        ;
    }

    public function findByZone(string $zone): array
    {
        $widgetsData = $this->connection->createQueryBuilder()
            ->from($this->databasePrefix . 'widget', 'w')
            ->select('w.id_widget, w.type, w.zone')
            ->where('w.zone = :zone')
            ->setParameter('zone', $zone)
            ->execute()
            ->fetchAllAssociative()
        ;
        
        $widgets = [];
        
        foreach ($widgetsData as $widgetData) {
            $widgets[] = (new WidgetModel())
                ->setId((int) $widgetData['id_widget'])
                ->setZoneId($widgetData['zone'])
                ->setType($widgetData['type'])
            ;
        }

        return $widgets;
    }

    public function save(WidgetModel $widget): bool
    {
        return false;
    }
}