<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Database\Repository;

use Legobuilder\Framework\Database\Bridge\DatabaseBridgeInterface;
use Legobuilder\Framework\Database\Model\WidgetModel;

class WidgetRepository implements WidgetRepositoryInterface
{
    /**
     * @var DatabaseBridgeInterface
     */
    protected $databaseBridge;

    public function __construct(DatabaseBridgeInterface $databaseBridge)
    {
        $this->databaseBridge = $databaseBridge;
    }

    public function find(int $widgetId): WidgetModel
    {
        return new WidgetModel();
    }

    public function findByZone(string $zone): array
    {
        return [];
    }
}
