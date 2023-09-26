<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Resolver;

use Legobuilder\Framework\Zone\Factory\ZoneFactoryInterface;
use Legobuilder\Framework\Zone\ZoneInterface;

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
     * Retrieve a specific zone from an identifier.
     *
     * @param $rootValue
     * @param array $args
     * 
     * @return ?ZoneInterface The formatted zone
     */
    public function getZone($rootValue, array $args): ?ZoneInterface
    {
        return $this->zoneFactory->getZone($args['id']);
    }
}
