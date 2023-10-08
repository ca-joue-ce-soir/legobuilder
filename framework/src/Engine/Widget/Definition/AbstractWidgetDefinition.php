<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine\Widget\Definition;

use Legobuilder\Framework\Engine\Control\ControlCollection;
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
    protected function configureControls(): ControlCollectionInterface
    {
        return (new ControlCollection());
    }

    private function resolveControls()
    {
        $controlCollection = $this->configureControls();
        $this->controls = $controlCollection->toArray();
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
