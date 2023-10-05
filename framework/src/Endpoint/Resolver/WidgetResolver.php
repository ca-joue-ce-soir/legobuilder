<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Resolver;

use Legobuilder\Framework\Widget\Factory\WidgetFactoryInterface;
use Legobuilder\Framework\Widget\WidgetInterface;

class WidgetResolver
{
    /**
     * @var WidgetFactoryInterface
     */
    private $widgetFactory;

    public function __construct(WidgetFactoryInterface $widgetFactory)
    {
        $this->widgetFactory = $widgetFactory;
    }

    /**
     * 
     */
    public function getWidget($rootValue, array $args): ?WidgetInterface
    {
        return $this->widgetFactory->getWidgetById((int) $args['id']);
    }
}
