<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Tests\Renderer;

use Legobuilder\Framework\Renderer\DefaultRenderer;
use Legobuilder\Framework\Widget\Definition\WidgetDefinition;
use Legobuilder\Framework\Widget\WidgetInterface;
use Legobuilder\Framework\Zone\ZoneInterface;
use PHPUnit\Framework\TestCase;

class DefaultRendererTest extends TestCase
{
    public function testRenderWidget(): void
    {
        $renderer = new DefaultRenderer();

        // Create a mock WidgetInterface
        $widget = $this->createMock(WidgetInterface::class);
        $widget->expects($this->once())
            ->method('getDefinition')
            ->willReturn($this->createMock(WidgetDefinition::class));
            
        $widget->getDefinition()->expects($this->once())
            ->method('getTemplatePath')
            ->willReturn('/path/to/template.php');

        // Assert the output of the renderWidget method
        ob_start();
        require_once $widget->getDefinition()->getTemplatePath();
        $expectedRender = ob_get_clean();

        $this->expectOutputString($expectedRender);
        $renderedWidget = $renderer->renderWidget($widget);
        $this->assertSame($expectedRender, $renderedWidget);
    }

    public function testRenderZone(): void
    {
        $renderer = new DefaultRenderer();
        $zone = $this->createMock(ZoneInterface::class);

        $expectedOutput = '<div class="zone"></div>';
        $this->assertSame($expectedOutput, $renderer->renderZone($zone));
    }
}