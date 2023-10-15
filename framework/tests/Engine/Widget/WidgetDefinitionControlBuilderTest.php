<?php

declare(strict_types=1);

use Legobuilder\Framework\Engine\WidgetDefinition\Control\ControlBuilderInterface;

class WidgetDefinitionControlBuilderTest extends TestCase
{
    /**
     * @var ControlBuilderInterface
     */
    private $controlBuilder;

    public function createControlTest(): void
    {
        $this->controlBuilder
            ->addSection('general', 'General')
            ->addGroup('group', 'Group')
            ->addField('title', TextControl::class, [
                'label' => 'Field widget',
                'required' => true
            ]);
        ;
    }
}