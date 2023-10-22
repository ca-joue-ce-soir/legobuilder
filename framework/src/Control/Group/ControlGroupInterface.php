<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Control\Group;

use Legobuilder\Framework\Collection\Exception\ItemNotFoundException;
use Legobuilder\Framework\Control\Field\ControlFieldInterface;

interface ControlGroupInterface
{
    /**
     * Get unique group identifier.
     *
     * @return string
     */
    public function getId(): string;

    /**
     * Get group label.
     */
    public function getLabel(): string;

    /**
     * Adds a control field to the collection.
     *
     * @param ControlFieldInterface $controlField The control field field to add.
     * @return self Returns the collection.
     */
    public function addField(ControlFieldInterface $controlField): self;

    /**
     * Remove a control field from the collection.
     *
     * @param string $id Control field id.
     * @return self Returns the collection.
     */
    public function removeField(string $id): self;

    /**
     * Add a control field after another one (from identifier).
     *
     * @param string $id Existing control field id.
     * @param ControlFieldInterface $controlField The control field to add.
     *
     * @throws ItemNotFoundException When column with given $id does not exist
     *
     * @return self Returns the collection.
     */
    public function addFieldAfter(string $id, ControlFieldInterface $controlField): self;

    /**
     * Add a control field before another one (from identifier).
     *
     * @param string $id Existing control field id.
     * @param ControlFieldInterface $controlField The control field to add.
     *
     * @throws ItemNotFoundException When column with given $id does not exist
     *
     * @return self Returns the collection.
     */
    public function addFieldBefore(string $id, ControlFieldInterface $controlField): self;

    /**
     * Get all control fields.
     *
     * @return ControlFieldInterface[] All controls fields.
     */
    public function getFields(): array;
}
