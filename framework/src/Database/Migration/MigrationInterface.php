<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Database\Migration;

interface MigrationInterface
{
    /**
     * Run database action.
     *
     * @throws DatabaseException
     * @return bool Success
     */
    public function run(): bool;
}
