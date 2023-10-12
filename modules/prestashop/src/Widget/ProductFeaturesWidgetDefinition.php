<?php

namespace Legobuilder\Widget;

use Legobuilder\Framework\Engine\Control\ControlCollection;
use Legobuilder\Framework\Engine\Control\ControlCollectionInterface;
use Legobuilder\Framework\Engine\Control\ControlGroup;
use Legobuilder\Framework\Engine\Control\Type\TextControl;
use Legobuilder\Framework\Engine\Widget\WidgetInterface;

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
    protected function configureControls(Optionsre): ControlCollectionInterface
    {
        return (new ControlCollection())
            ->add(
                (new ControlGroup('styles'))
                    ->add(
                        (new TextControl('title'))
                            ->setOptions([
                                'label' => $this->trans('Title', 'Modules.Legobuilder.Widget'),
                                'required' => true
                            ])
                    )
            )
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