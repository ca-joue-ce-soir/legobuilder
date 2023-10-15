<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Engine\WidgetDefinition\Controls;

interface WidgetDefinitionControlsBuilderInterface
{
    public function addGroup(string $groupIdentifier, string $label): self;

    public function addSection(string $sectionIdentifier, string $label): self;

    public function addField(string $fieldIdentifier, string $type, array $options = []): self;

    public function build(): WidgetDefinitionControls;
}
