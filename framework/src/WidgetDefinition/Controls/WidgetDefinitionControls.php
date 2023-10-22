<?php

declare(strict_types=1);

namespace Legobuilder\Framework\WidgetDefinition\Controls;

use Legobuilder\Framework\Control\Field\ControlFieldInterface;
use Legobuilder\Framework\Control\Group\ControlGroupInterface;
use Legobuilder\Framework\Control\Section\ControlSectionInterface;

final class WidgetDefinitionControls
{
    /**
     * @var ControlSectionInterface[] All control sections.
     */
    private $sections;

    /**
     * @var ControlGroupInterface[] All control groups.
     */
    private $groups;

    /**
     * @var ControlFieldInterface[] All control fields.
     */
    private $fields;

    public function __construct(array $sections, array $groups, array $fields)
    {
        $this->sections = $sections;
        $this->groups = $groups;
        $this->fields = $fields;
    }

    /**
     * Retrieves the sections.
     *
     * @return ControlSectionInterface[] The list of sections.
     */
    public function getSections(): array
    {
        return $this->sections;
    }

    /**
     * Get all control groups.
     *
     * @return  ControlGroupInterface[]
     */
    public function getGroups(): array
    {
        return $this->groups;
    }

    /**
     * Get all control fields.
     *
     * @return  ControlFieldInterface[]
     */
    public function getFields(): array
    {
        return $this->fields;
    }
}
