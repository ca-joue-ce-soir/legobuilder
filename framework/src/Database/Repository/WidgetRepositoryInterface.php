<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Database\Repository;

use Legobuilder\Framework\Database\Model\WidgetModel;

interface WidgetRepositoryInterface
{
    public function find(int $widgetId): WidgetModel;

    public function findByZone(string $zone): array;
}
