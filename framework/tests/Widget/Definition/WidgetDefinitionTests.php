<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Tests\Widget\Definition;

use Legobuilder\Framework\Control\Base\ColorControl;
use Legobuilder\Framework\Control\Base\NumberControl;
use Legobuilder\Framework\Control\Base\TextControl;
use Legobuilder\Framework\Control\ControlCollection;
use Legobuilder\Framework\Widget\Definition\WidgetDefinition;
use PHPUnit\Framework\TestCase;

class WidgetDefinitionTests extends TestCase
{
    public function testSimpleWidgetDefinition()
    {
        $widgetDefinition = (new WidgetDefinition())
            ->setName('Widget name')
            ->setId('widget_id')
            ->setTemplatePath('views/templates/widgets/widget_id.tpl')
            ->setControls((new ControlCollection())
                ->add('control_0', TextControl::class)
                ->add('control_1', NumberControl::class)
                ->add('control_2', ColorControl::class)
            )
        ;

        $this->assertSame($widgetDefinition->getName(), 'Widget name');
        $this->assertSame($widgetDefinition->getId(), 'widget_id');
        $this->assertSame($widgetDefinition->getTemplatePath(), 'views/templates/widgets/widget_id.tpl');

        $controls = $widgetDefinition->getControls();
        $controlsKeys = $controls->getKeys();

        $this->assertContains('control_0', $controlsKeys);
        $this->assertContains('control_1', $controlsKeys);
        $this->assertContains('control_2', $controlsKeys);
    }
}
