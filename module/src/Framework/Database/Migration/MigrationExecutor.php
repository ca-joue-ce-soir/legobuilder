<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Database\Migration;

use Legobuilder\Framework\Database\Adapter\DatabaseAdapterInterface;

class MigrationExecutor
{
    /**
     * @var AbstractMigration[]
     */
    protected $migrations;

    /**
     * @var DatabaseAdapterInterface
     */
    protected $databaseAdapter;

    public function __construct(DatabaseAdapterInterface $databaseAdapter)
    {
        $this->databaseAdapter = $databaseAdapter;
        $this->migrations = [];
    }

    public function registerMigration(string $migration): MigrationExecutor
    {
        if (!is_subclass_of($migration, AbstractMigration::class)) {
            return $this;
        }

        $this->migrations[] = new $migration($this->databaseAdapter);

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