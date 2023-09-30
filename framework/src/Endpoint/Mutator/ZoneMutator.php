<?php

declare(strict_types=1);

namespace Legobuilder\Framework\Endpoint\Mutator;

use Exception;
use Legobuilder\Framework\Zone\Factory\ZoneFactoryInterface;

class ZoneMutator
{
    /**
     * @var ZoneFactoryInterface
     */
    private $zoneFactory;

    public function updateZone($rootValue, array $args): void
    {
        $zoneIdentifier = (string) $args['id'];
        $zone = $this->zoneFactory->getZone($zoneIdentifier);

        if (null == $zone) {
            throw new Exception(sprintf('Zone %s does not exist.', $zoneIdentifier));
        }

        $widgets = $args['widgets'];

        foreach ($widgets as $widget) {
            
        }
    }
}
