<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine\Control\Section;

use Legobuilder\Framework\Collection\Exception\ItemNotFoundException;
use Legobuilder\Framework\Engine\Control\Group\ControlGroupInterface;

interface ControlSectionInterface
{
    /**
     * Get unique section identifier.
     *
     * @return string Unique section identifier.
     */
    public function getId(): string;

    /**
     * Get group label.
     *
     * @return string Label of the control group.
     */
    public function getLabel(): string;

    /**
     * Get icon of section.
     *
     * @return string SVG icon of the section.
     */
    public function getIcon(): string;

    /**
     * Adds a control group to the collection.
     *
     * @param ControlGroupInterface $controlGroup The control group to add.
     * @return self Returns the collection.
     */
    public function addGroup(ControlGroupInterface $controlGroup): self;

    /**
     * Remove a control group from the collection.
     *
     * @param string $id Control group id.
     * @return self Returns the collection.
     */
    public function removeGroup(string $id): self;

    /**
     * Add a control group after another one (from identifier).
     *
     * @param string $id Existing control id.
     * @param ControlGroupInterface $controlGroup The control group to add.
     *
     * @throws ItemNotFoundException When column with given $id does not exist
     *
     * @return self Returns the collection.
     */
    public function addGroupAfter(string $id, ControlGroupInterface $controlGroup): self;

    /**
     * Add a control group before another one (from identifier).
     *
     * @param string $id Existing control id.
     * @param ControlGroupInterface $controlGroup The control group to add.
     *
     * @throws ItemNotFoundException When column with given $id does not exist
     *
     * @return self Returns the collection.
     */
    public function addGroupBefore(string $id, ControlGroupInterface $controlGroup): self;

    /**
     * Get all control groups.
     *
     * @return ControlGroupInterface[] All control groups.
     */
    public function getGroups(): array;
}
