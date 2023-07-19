<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Database\Migration;

use Legobuilder\Framework\Database\DatabaseBridgeInterface;

class MigrationExecutor
{
    /**
     * @var AbstractMigration[]
     */
    protected $migrations;

    /**
     * @var DatabaseBridgeInterface
     */
    protected $databaseBridge;

    public function __construct(DatabaseBridgeInterface $databaseBridge)
    {
        $this->migrations = [];
    }

    public function registerMigration(AbstractMigration $migration)
    {

    }

    public function runUp()
    {
        foreach ($this->migrations as $migration) {
            $migration->up();
        }
    }

    public function runDown()
    {

    }

    public function rollback()
    {

    }
}