<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Resolver;

use Legobuilder\Framework\Engine\Zone\Factory\ZoneFactoryInterface;
use Legobuilder\Framework\Engine\Zone\ZoneInterface;

class ZoneResolver
{
    /**
     * @var ZoneFactoryInterface
     */
    private $zoneFactory;

    public function __construct(ZoneFactoryInterface $zoneFactory)
    {
        $this->zoneFactory = $zoneFactory;
    }

    /**
     * Retrieves a zone object based on the ID.
     *
     * @param mixed $rootValue The root value.
     * @param array $args The arguments.
     * @return ZoneInterface|null The retrieved ZoneInterface object, or null if not found.
     */
    public function getZone($rootValue, array $args): ?ZoneInterface
    {
        return $this->zoneFactory->getZone($args['id']);
    }
}
