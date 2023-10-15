<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine\Control\Section;

use Legobuilder\Framework\Collection\AbstractOrderedCollection;
use Legobuilder\Framework\Engine\Control\Group\ControlGroupInterface;

class ControlSection extends AbstractOrderedCollection implements ControlSectionInterface
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $label;

    /**
     * @var ?string
     */
    private $icon;

    public function __construct(string $id, string $label, ?string $icon = null)
    {
        $this->id = $id;
        $this->label = $label;
        $this->icon = $icon;
    }

    /**
     * Get the value of id
     *
     * @return  string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Get the value of label
     *
     * @return  string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * Get the value of icon
     *
     * @return  string
     */
    public function getIcon(): string
    {
        return $this->icon;
    }

    /**
     * Adds a control field to the collection.
     *
     * {@inheritdoc}
     */
    public function addGroup(ControlGroupInterface $controlGroup): self
    {
        $this->items[$controlGroup->getId()] = $controlGroup;

        return $this;
    }

    /**
     * Removes an item from the collection.
     *
     * {@inheritdoc}
     */
    public function removeGroup(string $id): self
    {
        if (isset($this->items[$id])) {
            unset($this->items[$id]);
        }

        return $this;
    }

    /**
     * Adds a control field before the specified ID in the collection.
     *
     * {@inheritdoc}
     */
    public function addGroupBefore(string $id, ControlGroupInterface $controlGroup): self
    {
        $this->insertByPosition($id, $controlGroup, AbstractOrderedCollection::POSITION_BEFORE);

        return $this;
    }

    /**
     * Adds a control after the specified ID in the collection.
     *
     * {@inheritdoc}
     */
    public function addGroupAfter(string $id, ControlGroupInterface $controlGroup): self
    {
        $this->insertByPosition($id, $controlGroup, self::POSITION_AFTER);

        return $this;
    }

    /**
     * Retrieves the list of groups.
     *
     * @return ControlGroupInterface[] The list of groups.
     */
    public function getGroups(): array
    {
        return $this->items;
    }
}
