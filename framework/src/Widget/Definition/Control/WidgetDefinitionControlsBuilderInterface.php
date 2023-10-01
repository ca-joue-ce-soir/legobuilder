<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Widget\Definition\Control;

interface WidgetDefinitionControlsBuilderInterface
{
    /**
     * Add control to builder.
     *
     * @param string        $id
     * @param class-string  $type
     * @param array         $options
     *
     * @return self
     */
    public function add($id, $type, array $options = []): self;

    /**
     * Remove control from builder.
     *
     * @param  string $id
     * @return self
     */
    public function remove(string $id): self;

    public function getControls(): WidgetDefinitionControlCollectionInterface;
}