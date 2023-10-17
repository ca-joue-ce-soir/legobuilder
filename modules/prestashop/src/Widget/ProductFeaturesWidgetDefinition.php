<?php

namespace Legobuilder\Widget;

use Legobuilder\Framework\Engine\Control\Field\Type\TextControlField;
use Legobuilder\Framework\Engine\Widget\WidgetInterface;
use Legobuilder\Framework\Engine\WidgetDefinition\Controls\WidgetDefinitionControlsBuilderInterface;

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
    protected function configureControls(WidgetDefinitionControlsBuilderInterface $controlsBuilder): void
    {
        $controlsBuilder
            ->addSection('generale', $this->trans('General', 'Modules.Legobuilder.Widget'))
            ->addGroup('group', $this->trans('Group', 'Modules.Legobuilder.Widget'))
            ->addField('title', TextControlField::class, [
                'label' => $this->trans('Field widget', 'Modules.Legobuilder.Widget'),
                'required' => true
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