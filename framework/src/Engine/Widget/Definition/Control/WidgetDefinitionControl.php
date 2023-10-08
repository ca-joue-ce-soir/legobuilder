<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine\Widget\Definition\Control;

use Legobuilder\Framework\Engine\Control\ControlInterface;

final class WidgetDefinitionControl
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var ControlInterface
     */
    private $control;

    /**
     * @var array
     */
    private $options;

    public function __construct(string $id, ControlInterface $control, array $options = [])
    {
        $this->id = $id;
        $this->control = $control;
        $this->options = $options;
    }

    /**
     * Get the value of id
     *
     * @return  string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of control
     *
     * @return  ControlInterface
     */
    public function getControl()
    {
        return $this->control;
    }

    /**
     * Get the value of options
     *
     * @return  array
     */
    public function getOptions()
    {
        return $this->options;
    }
}
