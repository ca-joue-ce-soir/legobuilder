<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Database\Repository;

use Legobuilder\Framework\Database\Bridge\DatabaseBridgeInterface;
use Legobuilder\Framework\Database\Entity\WidgetRevision;

class WidgetRevisionRepository
{
    /**
     * @var DatabaseBridgeInterface
     */
    protected $databaseBridge;

    public function __construct(DatabaseBridgeInterface $databaseBridge)
    {
        $this->databaseBridge = $databaseBridge;
    }

    /**
     * 
     * 
     * @return WidgetRevision[] 
     */
    public function getWidgetsInZone(string $zoneIdentifier): array
    {
        $widgetsModels = [];

        

        return $widgetsModels;
    }
}
