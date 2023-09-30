<?php

declare(strict_types=1);

namespace Legobuilder\Database\Migration;

class MigrationExecutor
{
    /**
     * @var MigrationInterface[]
     */
    protected $migrations;

    public function __construct()
    {
        $this->migrations = [];
    }

    public function registerMigration(object $migration): MigrationExecutor
    {
        if (!is_subclass_of($migration, MigrationInterface::class)) {
            return $this;
        }

        $this->migrations[] = $migration;

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
