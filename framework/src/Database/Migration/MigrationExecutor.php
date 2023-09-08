<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Database\Migration;

use Legobuilder\Framework\Database\Bridge\DatabaseBridgeInterface;

class MigrationExecutor
{
    /**
     * @var MigrationInterface[]
     */
    protected $migrations;

    /**
     * @var DatabaseBridgeInterface
     */
    protected $databaseBridge;

    public function __construct(DatabaseBridgeInterface $databaseBridge)
    {
        $this->databaseBridge = $databaseBridge;
        $this->migrations     = [];
    }

    public function registerMigration(string $migration): MigrationExecutor
    {
        if (!is_subclass_of($migration, MigrationInterface::class)) {
            return $this;
        }

        $this->migrations[] = new $migration($this->databaseBridge);

        return $this;
    }

    public function runUp(): bool
    {
        foreach ($this->migrations as $migration) {
            if (!$migration->up()) {
                return false;
            }
        }

        return true;
    }

    public function runDown(): bool
    {
        foreach ($this->migrations as $migration) {
            if (!$migration->down()) {
                return false;
            }
        }

        return true;
    }

    public function rollback()
    {
    }
}
