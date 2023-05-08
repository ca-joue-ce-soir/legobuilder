<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Database;

use Legobuilder\Framework\Database\Migration\MigrationInterface;

final class DatabaseInstaller implements MigrationInterface
{
    public function run(): bool
    {
        return true;
    }
}
