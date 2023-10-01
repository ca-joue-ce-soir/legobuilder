<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Widget\Definition\Control;

use Legobuilder\Framework\Collection\AbstractCollection;
use Legobuilder\Framework\Control\Registry\ControlRegistryInterface;

class WidgetDefinitionControlsBuilder extends AbstractCollection implements WidgetDefinitionControlsBuilderInterface
{
    /**
     * @var ControlRegistryInterface
     */
    private $controlRegistry;

    public function __construct(ControlRegistryInterface $controlRegistry)
    {
        $this->controlRegistry = $controlRegistry;
    }

    /**
     * Adds a new item to the widget definition controls.
     *
     * @param mixed $id The ID of the item.
     * @param mixed $type The type of the item.
     * @param array $options An optional array of additional options for the item.
     * @return WidgetDefinitionControlsBuilderInterface The updated instance of the builder.
     */
    public function add($id, $controlClass, array $options = []): WidgetDefinitionControlsBuilderInterface
    {
        $this->items[$id] = [
            'class' => $controlClass,
            'options' => $options,
        ];

        return $this;
    }

    /**
     * Remove widget defition from collection.
     *
     * @param  string $id
     * @return self
     */
    public function remove(string $id): self
    {
        unset($this->items[$id]);

        return $this;
    }

    /**
     * Generate the collection of widget definition controls.
     *
     * @return WidgetDefinitionControlCollectionInterface The collection of widget definition controls.
     */
    public function getControls(): WidgetDefinitionControlCollectionInterface
    {
        $widgetDefinitionControls = new WidgetDefinitionControlCollection();

        foreach ($this->items as $widgetDefinitionControlId => $widgetDefinitionControlData) {
            $widgetDefinitionControl = new WidgetDefinitionControl(
                $widgetDefinitionControlId,
                $this->controlRegistry->getControlByClass($widgetDefinitionControlData['class']),
                $widgetDefinitionControlData['options']
            );

            $widgetDefinitionControls->add($widgetDefinitionControl);
        }

        return $widgetDefinitionControls;
    }
}