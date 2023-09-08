<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Widget\Definition;

use Legobuilder\Framework\Control\Widget\Definition\Control\WidgetDefinitionControlCollectionInterface;
use Legobuilder\Framework\Widget\Definition\Control\WidgetDefinitionControlCollection;

abstract class AbstractWidgetDefinition implements WidgetDefinitionInterface
{
    /**
     * Get default controls.
     *
     * {@inheritdoc}
     */
    public function getControls(): WidgetDefinitionControlCollectionInterface
    {
        return (new WidgetDefinitionControlCollection());
    }
}
