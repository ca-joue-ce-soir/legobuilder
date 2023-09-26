<?php

namespace Legobuilder\Widget;

use Legobuilder\Framework\Control\Base\TextControl;
use Legobuilder\Framework\Renderer\RendererInterface;
use Legobuilder\Framework\Widget\Definition\Control\WidgetDefinitionControlCollectionInterface;
use Legobuilder\Framework\Widget\Definition\Control\WidgetDefinitionControlCollection;
use Legobuilder\Framework\Widget\WidgetInterface;

class ProductFeaturesWidgetDefinition extends AbstractTranslatorWidgetDefinition
{
    public function getId(): string
    {
        return 'product-features';
    }

    public function getName(): string
    {
        return $this->trans('Widget name', 'Modules.Legobuilder.Widget');
    }

    /**
     * Get Product Features Widget controls.
     * 
     * {@inheritdoc}
     */
    public function getControls(): WidgetDefinitionControlCollectionInterface
    {
        return (new WidgetDefinitionControlCollection())
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
    public function render(WidgetInterface $widget, RendererInterface $renderer): string
    {
        return $renderer->view('module:legobuilder/views/templates/widget/product_features.tpl', [
            'products' => []
        ]);
    }
}