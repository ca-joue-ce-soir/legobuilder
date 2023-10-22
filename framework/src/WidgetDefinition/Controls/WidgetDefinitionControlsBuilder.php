<?php

declare(strict_types=1);

namespace Legobuilder\Framework\WidgetDefinition\Controls;

use Exception;
use Legobuilder\Framework\Control\Field\ControlFieldInterface;
use Legobuilder\Framework\Control\Group\ControlGroup;
use Legobuilder\Framework\Control\Group\ControlGroupInterface;
use Legobuilder\Framework\Control\Section\ControlSection;
use Legobuilder\Framework\Control\Section\ControlSectionInterface;
use Legobuilder\Framework\WidgetDefinition\Exception\InvalidControlFieldTypeException;
use Legobuilder\Framework\WidgetDefinition\Exception\SectionCannotBeEmptyException;

final class WidgetDefinitionControlsBuilder implements WidgetDefinitionControlsBuilderInterface
{
    /**
     * @var ControlSectionInterface[] All control sections.
     */
    private $sections = [];

    /**
     * @var ControlGroupInterface[] All control groups.
     */
    private $groups = [];

    /**
     * @var ControlFieldInterface[] All control fields.
     */
    private $fields = [];

    /**
     * Adds a new section.
     *
     * @param string $sectionIdentifier The identifier of the section.
     * @param string $label The label of the section.
     * @return self The modified object.
     */
    public function addSection(string $sectionIdentifier, string $label): self
    {
        $this->sections[$sectionIdentifier] = new ControlSection($sectionIdentifier, $label);

        return $this;
    }

    /**
     * Create a new group and assign it to the latest section.
     *
     * @param string $groupIdentifier The identifier of the group.
     * @param string $label The label of the group.
     *
     * @throws SectionCannotBeEmptyException If the sections array is empty.
     *
     * @return self Returns the current instance of the controls builder.
     */
    public function addGroup(string $groupIdentifier, string $label): self
    {
        if (empty($this->sections)) {
            throw new SectionCannotBeEmptyException();
        }

        $controlGroup = new ControlGroup($groupIdentifier, $label);

        $latestSection = end($this->sections);
        $latestSection->addGroup($controlGroup);

        $this->groups[$groupIdentifier] = $controlGroup;

        return $this;
    }

    /**
     * Adds a new field to the latest group.
     *
     * @param string $fieldIdentifier The identifier of the field.
     * @param string $type The type of the field. Must be a class name that implements ControlFieldInterface.
     * @param array $options An optional array of options for the field.
     *
     * @throws SectionCannotBeEmptyException If the sections array is empty.
     * @throws InvalidControlFieldTypeException If the type parameter is not a valid control field type.
     *
     * @return self Returns the current instance of the controls builder.
     */
    public function addField(string $fieldIdentifier, string $type, array $options = []): self
    {
        if (empty($this->sections)) {
            throw new SectionCannotBeEmptyException();
        }

        if (false === class_exists($type) || false === is_subclass_of($type, ControlFieldInterface::class)) {
            throw new InvalidControlFieldTypeException();
        }

        /** @var ControlFieldInterface $controlField */
        $controlField = new $type($fieldIdentifier);
        $controlField->setOptions($options);

        $latestGroup = end($this->groups);
        $latestGroup->addField($controlField);

        $this->fields[$fieldIdentifier] = $controlField;

        return $this;
    }

    /**
     * Builds the controls.
     *
     * @return WidgetDefinitionControls The built controls.
     */
    public function build(): WidgetDefinitionControls
    {
        $control = new WidgetDefinitionControls(
            $this->sections,
            $this->groups,
            $this->fields
        );

        $this->sections = [];
        $this->groups = [];
        $this->fields = [];

        return $control;
    }
}
