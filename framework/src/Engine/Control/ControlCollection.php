<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine\Control;

use Legobuilder\Framework\Collection\AbstractCollection;
use Legobuilder\Framework\Engine\Control\Exception\ControlNotFoundException;

class ControlCollection extends AbstractCollection implements ControlCollectionInterface
{
    /**
     * @internal
     */
    public const POSITION_AFTER = 'after';

    /**
     * @internal
     */
    public const POSITION_BEFORE = 'before';

    /**
     * Adds a control  to the collection.
     *
     * {@inheritdoc}
     */
    public function add(ControlInterface $control): self
    {
        $this->items[$control->getId()] = $control;

        return $this;
    }

    /**
     * Removes an item from the collection.
     *
     * {@inheritdoc}
     */
    public function remove(string $id): self
    {
        if (isset($this->items[$id])) {
            unset($this->items[$id]);
        }

        return $this;
    }

    /**
     * Adds a control before the specified ID in the collection.
     *
     * {@inheritdoc}
     */
    public function addBefore(string $id, ControlInterface $control): ControlCollectionInterface
    {
        $this->insertByPosition($id, $control, self::POSITION_BEFORE);

        return $this;
    }

    /**
     * Adds a control after the specified ID in the collection.
     *
     * {@inheritdoc}
     */
    public function addAfter(string $id, ControlInterface $control): ControlCollectionInterface
    {
        $this->insertByPosition($id, $control, self::POSITION_AFTER);

        return $this;
    }

    /**
     * Inserts a control by position in the items array.
     *
     * @param string $id The ID of the control to insert.
     * @param ControlInterface $control The control object to insert.
     * @param mixed $position The position at which to insert the control.
     *
     * @throws ControlNotFoundException If the control with the given ID does not exist.
     */
    private function insertByPosition(string $id, ControlInterface $control, $position)
    {
        if (!isset($this->items[$id])) {
            throw new ControlNotFoundException($id);
        }

        $existingControlKeyPosition = (int) array_search($id, array_keys($this->items));

        if (self::POSITION_AFTER === $position) {
            ++$existingControlKeyPosition;
        }

        $controls = array_slice($this->items, 0, $existingControlKeyPosition, true)
            + [$control->getId() => $control]
            + array_slice($this->items, $existingControlKeyPosition, null, true)
        ;

        $this->items = $controls;
    }

    /**
     * Get the controls.
     *
     * @return ControlInterface[] The controls.
     */
    public function toArray(): array
    {
        return $this->items;
    }
}
