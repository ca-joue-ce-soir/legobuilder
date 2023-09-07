<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Database\Migration;

use Legobuilder\Framework\Database\Bridge\DatabaseBridgeInterface;

abstract class AbstractDatabaseMigration implements MigrationInterface
{
    /**
     * @var DatabaseBridgeInterface
     */
    protected $databaseBridge;

    public function __construct(DatabaseBridgeInterface $databaseBridge)
    {
        $this->databaseBridge = $databaseBridge;
    }
}
