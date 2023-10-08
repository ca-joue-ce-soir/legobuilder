<?php

declare(strict_types=1);

use Legobuilder\Framework\Persistence\Model\WidgetModel;
use Legobuilder\Framework\Persistence\Repository\WidgetRepositoryInterface;
use PHPUnit\Framework\TestCase;

class WidgetRepositoryTest extends TestCase
{
    public function testFind(): void
    {
        $widgetId = 1;
        $widget = new WidgetModel($widgetId, 'zone1', 'name1');

        $widgetRepository = $this->createMock(WidgetRepositoryInterface::class);
        $widgetRepository->expects($this->once())
            ->method('find')
            ->with($widgetId)
            ->willReturn($widget);

        $foundWidget = $widgetRepository->find($widgetId);
        $this->assertEquals($widget, $foundWidget);
    }

    public function testFindByZone(): void
    {
        $zone = 'displayHome';
        $widget1 = new WidgetModel(1, $zone, 'name1');
        $widget2 = new WidgetModel(2, $zone, 'name2');

        $widgetRepository = $this->createMock(WidgetRepositoryInterface::class);
        $widgetRepository->expects($this->once())
            ->method('findByZone')
            ->with($zone)
            ->willReturn([$widget1, $widget2]);

        $foundWidgets = $widgetRepository->findByZone($zone);
        $this->assertEquals([$widget1, $widget2], $foundWidgets);
    }

    public function testSave(): void
    {
        $widget = new WidgetModel(1, 'zone1', 'name1');

        $widgetRepository = $this->createMock(WidgetRepositoryInterface::class);
        $widgetRepository->expects($this->once())
            ->method('save')
            ->with($widget)
            ->willReturn(true);

        $result = $widgetRepository->save($widget);
        $this->assertTrue($result);
    }
}