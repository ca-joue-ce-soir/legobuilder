<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Widget;

use Legobuilder\Framework\Widget\Data\WidgetDataInterface;
use Legobuilder\Framework\Widget\Definition\WidgetDefinitionInterface;

final class Widget implements WidgetInterface
{
    /**
     * @var WidgetDefinitionInterface
     */
    private $definition;

    /**
     * @var WidgetDataInterface
     */
    private $data;

    /**
     * Get Widget definition.
     *
     * @return WidgetDefinitionInterface
     */
    public function getDefinition(): WidgetDefinitionInterface
    {
        return $this->definition;
    }

    /**
     * Get Widget data.
     *
     * @return WidgetDataInterface
     */
    public function getData(): WidgetDataInterface
    {
        return $this->data;
    }
}
