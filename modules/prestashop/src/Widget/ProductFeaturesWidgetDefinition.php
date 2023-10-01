<?php

namespace Legobuilder\Widget;

use Legobuilder\Framework\Control\Type\ColorControl;
use Legobuilder\Framework\Control\Type\NumberControl;
use Legobuilder\Framework\Control\Type\TextControl;
use Legobuilder\Framework\Widget\Definition\Control\WidgetDefinitionControlsBuilderInterface;
use Legobuilder\Framework\Widget\WidgetInterface;

class ProductFeaturesWidgetDefinition extends AbstractPrestashopWidgetDefinition
{
    /**
     * Get identifier for the widget.
     * 
     * {@inheritdoc}
     */
    public function getId(): string
    {
        return 'product-features';
    }

    /**
     * Get name of the widget.
     * 
     * {@inheritdoc}
     */
    public function getName(): string
    {
        return $this->trans('Widget name', 'Modules.Legobuilder.Widget');
    }

    /**
     * Get Product Features Widget controls.
     * 
     * {@inheritdoc}
     */
    public function buildControls(WidgetDefinitionControlsBuilderInterface $widgetDefinitionControlsBuilder): void
    {
        $widgetDefinitionControlsBuilder
            ->add('control_0', TextControl::class, [
                'label' => $this->trans('Control 0', 'Modules.Legobuilder.Widget')
            ])
            ->add('control_1', NumberControl::class, [
                'label' => $this->trans('Control 1', 'Modules.Legobuilder.Widget')
            ])
            ->add('control_2', ColorControl::class, [
                'label' => $this->trans('Control 2', 'Modules.Legobuilder.Widget')
            ])
        ;
    }

    /**
     * Render Product Features Widget for the frontend.
     * 
     * {@inheritdoc}
     */
    public function render(WidgetInterface $widget): string
    {
        return $this->view('module:legobuilder/views/templates/widget/product_features.tpl', [
            'products' => []
        ]);
    }
}