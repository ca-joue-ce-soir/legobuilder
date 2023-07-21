<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Database\Model;

interface WidgetModelInterface
{
    public function getId();

    public function getZone();

    public function setZone(string $zone): self;

    public function getControlSettings(): array;

    public function setControlSettings(array $settings): self;
}