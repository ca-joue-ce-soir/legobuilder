<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine\Widget;

use Legobuilder\Framework\Engine\WidgetDefinition\WidgetDefinitionInterface;
use Legobuilder\Framework\Engine\Zone\ZoneInterface;

final class Widget implements WidgetInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $zoneId;

    /**
     * @var array
     */
    private $settings;

    /**
     * @var WidgetDefinitionInterface
     */
    private $widgetDefinition;

    public function __construct(
        int $id,
        string $zoneId,
        array $settings,
        WidgetDefinitionInterface $widgetDefinition
    ) {
        $this->id = $id;
        $this->zoneId = $zoneId;
        $this->settings = $settings;
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
    public function getZoneId(): string
    {
        return $this->zoneId;
    }

    /**
     * Get Widget Definition.
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
    public function getSettings(): array
    {
        return $this->settings;
    }
}
