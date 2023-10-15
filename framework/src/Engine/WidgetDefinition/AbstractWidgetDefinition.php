<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine\WidgetDefinition;

use Legobuilder\Framework\Engine\WidgetDefinition\Controls\WidgetDefinitionControls;
use Legobuilder\Framework\Engine\WidgetDefinition\Controls\WidgetDefinitionControlsBuilder;
use Legobuilder\Framework\Engine\WidgetDefinition\Controls\WidgetDefinitionControlsBuilderInterface;

abstract class AbstractWidgetDefinition implements WidgetDefinitionInterface
{
    /**
     * @var WidgetDefinitionControls
     */
    private $controls;

    /**
     * {@inheritdoc}
     */
    protected function configureControls(WidgetDefinitionControlsBuilderInterface $controlsBuilder): void
    {
    }

    /**
     * Resolves the controls for the widget definition.
     */
    private function resolveControls()
    {
        $widgetDefinitionControlsBuilder = new WidgetDefinitionControlsBuilder();
        $this->configureControls($widgetDefinitionControlsBuilder);

        $this->controls = $widgetDefinitionControlsBuilder->build();
    }

    /**
     * Retrieves the controls for the widget definition.
     *
     * {@inheritdoc}
     */
    public function getControls(): WidgetDefinitionControls
    {
        if (null === $this->controls) {
            $this->resolveControls();
        }

        return $this->controls;
    }
}
