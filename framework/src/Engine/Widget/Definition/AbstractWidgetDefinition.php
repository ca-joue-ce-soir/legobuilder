<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine\Widget\Definition;

    use Legobuilder\Framework\Engine\Control\ControlCollectionInterface;
use Legobuilder\Framework\Engine\Control\ControlInterface;

abstract class AbstractWidgetDefinition implements WidgetDefinitionInterface
{
    /**
     * @var ControlInterface[]
     */
    private $controls;

    /**
     * {@inheritdoc}
     */
    protected function configureControls(ControlBuilder $builder): ControlCollectionInterface
    {
        $builder
            ->addSection('General')
            ->addGroup('Group')
            ->addField('title', TextControl::class, [
                'label' => $this->trans('Title', 'Modules.Legobuilder.Widget'),
                'required' => true
            ])
            ->addField('title', TextControl::class, [
                'label' => $this->trans('Title', 'Modules.Legobuilder.Widget'),
                'required' => true
            ])
            ->addField('title', TextControl::class, [
                'label' => $this->trans('Title', 'Modules.Legobuilder.Widget'),
                'required' => true
            ])
        ;
    }

    /**
     * Resolves the controls for the widget definition.
     *
     * @throws Some_Exception_Class Description of exception
     */
    private function resolveControls()
    {
        $widgetDefinitionControlBuilder = new WidgetDefinitionControlBuilder();
        $this->configureControls($widgetDefinitionControlBuilder);

        $this->controls = $widgetDefinitionControlBuilder->getControls();
    }

    /**
     * Retrieves the controls for the widget definition.
     *
     * {@inheritdoc}
     */
    public function getControls(): array
    {
        if (null === $this->controls) {
            $this->resolveControls();
        }

        return $this->controls;
    }
}
