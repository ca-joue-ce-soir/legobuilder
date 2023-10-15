<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine\Control\Group;

use Legobuilder\Framework\Collection\AbstractOrderedCollection;
use Legobuilder\Framework\Engine\Control\Field\ControlFieldInterface;
use Legobuilder\Framework\Engine\Control\Group\ControlGroupInterface;

class ControlGroup extends AbstractOrderedCollection implements ControlGroupInterface
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $label;

    public function __construct(string $id, string $label)
    {
        $this->id = $id;
        $this->label = $label;
    }

    /**
     * Get the value of id
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Get the value of label
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * Adds a control field to the collection.
     *
     * {@inheritdoc}
     */
    public function addField(ControlFieldInterface $controlField): self
    {
        $this->items[$controlField->getId()] = $controlField;

        return $this;
    }

    /**
     * Removes an item from the collection.
     *
     * {@inheritdoc}
     */
    public function removeField(string $id): self
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
    public function addFieldBefore(string $id, ControlFieldInterface $controlField): self
    {
        $this->insertByPosition($id, $controlField, AbstractOrderedCollection::POSITION_BEFORE);

        return $this;
    }

    /**
     * Adds a control after the specified ID in the collection.
     *
     * {@inheritdoc}
     */
    public function addFieldAfter(string $id, ControlFieldInterface $controlField): self
    {
        $this->insertByPosition($id, $controlField, self::POSITION_AFTER);

        return $this;
    }

    /**
     * Get the controls.
     *
     * @return ControlFieldInterface[] The controls.
     */
    public function getFields(): array
    {
        return $this->items;
    }
}
