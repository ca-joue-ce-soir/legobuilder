<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Widget;

use Legobuilder\Framework\Widget\Definition\WidgetDefinitionInterface;
use Legobuilder\Framework\Zone\ZoneInterface;

final class Widget implements WidgetInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $zone;

    /**
     * @var array
     */
    private $controlSettings;

    /**
     * @var WidgetDefinitionInterface
     */
    private $widgetDefinition;

    public function __construct(
        int $id,
        string $zone,
        array $controlSettings,
        WidgetDefinitionInterface $widgetDefinition
    ) {
        $this->id = $id;
        $this->zone = $zone;
        $this->controlSettings = $controlSettings;
        $this->widgetDefinition = $widgetDefinition;
    }

    /**
     * Get Widget ID.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get Widget Zone identifier.
     *
     * @return string
     */
    public function getZoneIdentifier(): string
    {
        return $this->zone;
    }

    /**
     *
     */
    public function getDefinition(): WidgetDefinitionInterface
    {
        return $this->widgetDefinition;
    }

    /**
     * Get Widget Control Settings.
     *
     * @return array
     */
    public function getControlSettings(): array
    {
        return $this->controlSettings;
    }
}
