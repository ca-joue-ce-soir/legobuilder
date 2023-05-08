<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Database;

use Legobuilder\Framework\Database\Migration\MigrationInterface;

final class DatabaseUninstaller implements MigrationInterface
{
    public function run(): bool
    {
        return true;
    }
}
