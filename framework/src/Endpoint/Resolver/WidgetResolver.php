<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Resolver;

use Legobuilder\Framework\Engine\Widget\Factory\WidgetFactoryInterface;
use Legobuilder\Framework\Engine\Widget\WidgetInterface;

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
     * Retrieves a widget by its ID.
     *
     * @param mixed $rootValue The root value.
     * @param array $args The arguments.
     * @return WidgetInterface|null The widget with the specified ID, or null if not found.
     */
    public function getWidget($rootValue, array $args): ?WidgetInterface
    {
        return $this->widgetFactory->getWidgetById((int) $args['id']);
    }
}
