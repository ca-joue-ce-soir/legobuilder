<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine\Control;

use Iterator;
use Legobuilder\Framework\Engine\Control\Exception\ControlNotFoundException;

interface ControlCollectionInterface extends Iterator
{
    /**
     * Adds a control to the collection.
     *
     * @param ControlInterface $control The control to add.
     * @return self Returns the current instance of the class.
     */
    public function add(ControlInterface $control): self;

    /**
     * Remove a control from the collection.
     *
     * @param string $id Control id.
     * @return self Returns the current instance of the class.
     */
    public function remove(string $id): self;

    /**
     * Add a control after another one (from identifier).
     *
     * @param string $id Existing control id.
     * @param ControlInterface $control The control to add.
     *
     * @throws ControlNotFoundException When column with given $id does not exist
     *
     * @return self Returns the current instance of the class.
     */
    public function addAfter(string $id, ControlInterface $control): self;

    /**
     * Add a control before another one (from identifier).
     *
     * @param string $id Existing control id.
     * @param ControlInterface $control The control to add.
     *
     * @throws ControlNotFoundException When column with given $id does not exist
     *
     * @return self Returns the current instance of the class.
     */
    public function addBefore(string $id, ControlInterface $control): self;

    /**
     * Get controls.
     *
     * @return ControlInterface[] Returns the controls.
     */
    public function toArray(): array;
}
