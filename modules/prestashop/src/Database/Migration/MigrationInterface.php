<?php

declare(strict_types=1);

namespace Legobuilder\Database\Migration;

interface MigrationInterface
{
    /**
     * Run the migration.
     *
     * @return bool Success
     */
    public function up(): bool;

    /**
     * Reverse the migration.
     *
     * @return bool Success
     */
    public function down(): bool;
}